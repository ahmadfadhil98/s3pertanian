<?php

namespace App\Http\Livewire;

use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use Livewire\Component;

class Bimbingan extends Component
{
    public $isOpen,$isDel,$delId;
    public $lecturerId,$lecturer_id,$position;

    public function render()
    {
        $lecturers = DisertasiLecturer::paginate(4);
        $lecturer = Lecturer::pluck('name','id');
        $positions = config('central.position');
        return view('livewire.bimbingan.index',[
            'lecturers' => $lecturers,
            'lecturer' => $lecturer,
            'positions' => $positions
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
                'lecturer_id' => 'required',
                'email' => 'required',
                'faculty' => 'required'
            ]
        );

        try {
            // dd($this->lecturerId);
            $lecturer = DisertasiLecturer::updateOrCreate(['id' => $this->lecturerId], [
                'name' => $this->name,
                'username' => $this->nip,
                'email' => $this->email,
                'password' => bcrypt($this->nip),
                'type' => 2,
                'remember_token' => null,
            ]);

            if($this->lecturerId){
                $user->lecturer()->update([
                    'name' => $this->name,
                    'nip' => $this->nip,
                    'faculty' => $this->faculty
                ]);
            }else{
                $user->lecturer()->create([
                    'name' => $this->name,
                    'nip' => $this->nip,
                    'faculty' => $this->faculty
                ]);
            }


            session()->flash('info', $this->lecturerId ? 'Dosen Update Successfully' : 'Dosen Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
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
            session()->flash('delete','Dosen Successfully Deleted');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }

    }
}
