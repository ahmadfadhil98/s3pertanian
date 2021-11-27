<?php

namespace App\Http\Livewire;

use App\Imports\StudentImport;
use App\Imports\UserImport;
use Livewire\WithPagination;
use App\Models\Student as ModelsStudent;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Student extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $isOpen,$isImport,$isDel,$delId,$search;
    public $studentId,$nim,$name,$email,$file;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $students = ModelsStudent::where('name','like',$searchParam)->orWhere('nim','like',$searchParam)->orderByDesc('id')->paginate(6);
        return view('livewire.student.index',[
            'students' => $students
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
        $this->studentId = '';
        $this->name = '';
        $this->nim = '';
        $this->email = '';
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

        Excel::import(new StudentImport, $this->file);

        $this->hideImport();
    }

    public function store(){


        $this->validate(
            [
                'name' => 'required',
                'nim' => 'required',
            ]
        );

        try {
            // dd($this->nim);
            $user = User::updateOrCreate(['id' => $this->studentId], [
                'name' => $this->name,
                'username' => $this->nim,
                'email' => $this->email,
                'password' => bcrypt($this->nim),
                'type' => 3,
                'remember_token' => null,
            ]);
            // dd($this->nim);
            $user->roles()->sync(3);

            if($this->studentId){
                $user->student()->update([
                    'name' => $this->name,
                    'nim' => $this->nim,
                ]);
            }else{
                $user->student()->create([
                    'name' => $this->name,
                    'nim' => $this->nim,
                ]);
            }


            session()->flash('info', $this->studentId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );
            $this->emit('saved');

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            dd($errorCode);
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
                $this->emit('saved');
            }
        }

        $this->hideModal();

        $this->studentId = '';
        $this->name = '';
        $this->nim = '';
        $this->email = '';
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $lecturer = ModelsStudent::findOrFail($id);
        $this->studentId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->nim = $lecturer->nim;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsStudent::find($id)->delete();
            User::find($id)->delete();
            session()->flash('delete','Berhasil Dihapus');
            $this->emit('saved');
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
            $this->emit('saved');
        }

    }
}
