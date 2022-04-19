<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Imports\UserImport;
use App\Imports\LecturerImport;
use App\Models\Lecturer as ModelsLecturer;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Lecturer extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $isOpen,$isImport,$isDel,$delId,$search;
    public $lecturerId,$nip,$faculty,$name,$email,$file;
	public $keterangan;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $lecturers = ModelsLecturer::where('name','like',$searchParam)->orWhere('nip','like',$searchParam)->paginate(6);
        $faculties = config('central.faculties');
        return view('livewire.lecturer.index',[
            'faculties' => $faculties,
            'lecturers' => $lecturers
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function showImport() {
        $this->isImport = true;
    }

    public function hideImport() {
        $this->file = '';
        $this->isImport = false;
    }

    public function hideModal() {
        $this->lecturerId = '';
        $this->name = '';
        $this->nip = '';
        $this->email = '';
        $this->faculty = '';
        $this->keterangan = '';
    	$this->isOpen = false;
    }

    public function showDel($id) {
        $this->delId = $id;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->isDel = false;
    }

    public function import(){
        $this->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);
        // dd($this->file);
        Excel::import(new UserImport, $this->file);
        Excel::import(new LecturerImport, $this->file);

        $this->hideImport();
    }

    public function store(){

        $this->validate(
            [
                'name' => 'required',
                'nip' => 'required',
                // 'email' => 'required',
                'faculty' => 'required'
            ]
        );
    
    	if($this->keterangan==16){
            $this->validate(
                [
                    'keterangan' => 'required'
                ]
            );
        }

        try {
            // dd($this->lecturerId);
            $nipi = $this->nip;
            $user = User::updateOrCreate(['id' => $this->lecturerId], [
            	'id' => $nipi,
                'name' => $this->name,
                'username' => $nipi,
                'email' => $nipi.'@mail.com',
                'password' => bcrypt($nipi),
                'type' => 2,
                'remember_token' => null,
            ]);
            $user->roles()->sync(2);

            if($this->lecturerId){
                $user->lecturer()->update([
                    'name' => $this->name,
                    'nip' => $nipi,
                    'faculty' => $this->faculty,
               	 	'keterangan'=> $this->keterangan
                ]);
            }else{
                $user->lecturer()->create([
                    'name' => $this->name,
                    'nip' => $nipi,
                    'faculty' => $this->faculty,
                	'keterangan'=> $this->keterangan
                ]);
            }


            session()->flash('info', $this->lecturerId ? 'Berhasil Diedit' : 'Berhasil Menambahkan' );
            $this->emit('saved');

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
                $this->emit('saved');
            }
        }

        $this->hideModal();

        $this->lecturerId = '';
        $this->name = '';
        $this->nip = '';
        $this->email = '';
        $this->faculty = '';
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $lecturer = ModelsLecturer::findOrFail($id);
        $this->lecturerId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->nip = $lecturer->nip;
        $this->faculty = $lecturer->faculty;
    	$this->keterangan = $lecturer->keterangan;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsLecturer::find($id)->delete();
            User::find($id)->delete();
            $this->emit('saved');
            session()->flash('delete','Berhasil Dihapus');
            $this->hideDel();
        }catch(QueryException $e){
            $this->emit('saved');
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }

    }
}
