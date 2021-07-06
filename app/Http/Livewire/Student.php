<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Student as ModelsStudent;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Student extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $studentId,$nim,$name,$email;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $students = ModelsStudent::where('name','like',$searchParam)->orWhere('nim','like',$searchParam)->paginate(5);
        return view('livewire.student.index',[
            'students' => $students
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
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
                'nim' => 'required',
                'email' => 'required',
            ]
        );

        try {
            // dd($this->studentId);
            $user = User::updateOrCreate(['id' => $this->studentId], [
                'name' => $this->name,
                'username' => $this->nim,
                'email' => $this->email,
                'password' => bcrypt($this->nim),
                'type' => 3,
                'remember_token' => null,
            ]);
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


            session()->flash('info', $this->studentId ? 'Mahasiswa Update Successfully' : 'Mahasiswa Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
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
            session()->flash('delete','Mahasiswa Successfully Deleted');
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }

    }
}
