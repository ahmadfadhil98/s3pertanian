<?php

namespace App\Http\Livewire;

use App\Models\Disertasi as ModelsDisertasi;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Disertasi extends Component
{
    public $isOpen,$isDel,$delId;
    public $disertasiId,$title,$student_id;
    public $user;

    public function render()
    {
        $this->user = Auth::user();
        $user = $this->user;
        $disertasis = ModelsDisertasi::all();
        $students = Student::pluck('name','id');
        $statuses = config('central.status');
        return view('livewire.disertasi.index',[
            'disertasis' => $disertasis,
            'students' => $students,
            'user' => $user,
            'statuses' => $statuses
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

        if($this->user->type==1){
            $this->validate(
                [
                    'title' => 'required',
                    'student_id' => 'required'
                ]
            );

            try {
                // dd($this->disertasiId);
                ModelsDisertasi::updateOrCreate(['id' => $this->disertasiId], [
                    'title' => $this->title,
                    'student_id' => $this->student_id,
                    'status' => 1
                ]);

                session()->flash('info', $this->disertasiId ? 'Dosen Update Successfully' : 'Dosen Created Successfully' );

            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    session()->flash('delete', 'Duplicate Entry');
                }
            }
        }elseif($this->user->type==3){

            $this->validate(
                [
                    'title' => 'required',
                ]
            );

            try {
                // dd($this->disertasiId);
                ModelsDisertasi::updateOrCreate(['id' => $this->disertasiId], [
                    'title' => $this->title,
                    'student_id' => $this->user->id
                ]);

                session()->flash('info', $this->disertasiId ? 'Dosen Update Successfully' : 'Dosen Created Successfully' );

            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    session()->flash('delete', 'Duplicate Entry');
                }
            }
        }

        $this->hideModal();
        $this->disertasiId = '';
        $this->title = '';
        $this->student_id = '';
    }

    public function edit($id){
        $disertasi = ModelsDisertasi::findOrFail($id);
        $this->disertasiId = $id;
        $this->title = $disertasi->title;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsDisertasi::find($id)->delete();
            session()->flash('delete','Dosen Successfully Deleted');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }

    }
}
