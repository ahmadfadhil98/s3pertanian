<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Lecturer as ModelsLecturer;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Lecturer extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $lecturerId,$nip,$faculty,$name,$email;

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

    public function hideModal() {
        $this->lecturerId = '';
        $this->name = '';
        $this->nip = '';
        $this->email = '';
        $this->faculty = '';
        $this->isOpen = false;
    }

    public function showDel($id) {
        $this->delId = $id;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->isDel = false;
    }

    public function store(){

        $this->validate(
            [
                'name' => 'required',
                'nip' => 'required',
                'email' => 'required',
                'faculty' => 'required'
            ]
        );

        try {
            // dd($this->lecturerId);
            $nipi = $this->nip + 333322113333220000;
            $user = User::updateOrCreate(['id' => $this->lecturerId], [
                'name' => $this->name,
                'username' => $nipi,
                'email' => $this->email,
                'password' => bcrypt($nipi),
                'type' => 2,
                'remember_token' => null,
            ]);
            $user->roles()->sync(2);

            if($this->lecturerId){
                $user->lecturer()->update([
                    'name' => $this->name,
                    'nip' => $nipi,
                    'faculty' => $this->faculty
                ]);
            }else{
                $user->lecturer()->create([
                    'name' => $this->name,
                    'nip' => $nipi,
                    'faculty' => $this->faculty
                ]);
            }


            session()->flash('info', $this->lecturerId ? 'Berhasil Diedit' : 'Berhasil Menambahkan' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
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
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsLecturer::find($id)->delete();
            User::find($id)->delete();
            session()->flash('delete','Berhasil Dihapus');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }

    }
}
