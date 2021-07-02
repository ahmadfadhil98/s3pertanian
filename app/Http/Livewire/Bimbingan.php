<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Bimbingan extends Component
{
    public $isOpen,$isDel,$delId;
    public $lecturerId,$lecturer_id,$position;
    public $disertasiId;

    public function mount($id){
        $this->disertasiId = $id;
    }

    public function render()
    {
        $lecturers = DisertasiLecturer::where('disertasi_id',$this->disertasiId)->paginate(4);
        $disertasi = Disertasi::find($this->disertasiId);
        $name = Lecturer::pluck('name','id');
        $student = Student::pluck('name','id');
        $faculties = config('central.faculties');
        $positions = config('central.position');
        $nip = Lecturer::pluck('nip','id');

        return view('livewire.bimbingan.index',[
            'lecturers' => $lecturers,
            'faculties' => $faculties,
            'disertasi' => $disertasi,
            'student' => $student,
            'name' => $name,
            'nip' => $nip,
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
                'position' => 'required',
            ]
        );

        try {
            // dd($this->lecturerId);
            DisertasiLecturer::updateOrCreate(['id' => $this->lecturerId], [
                'disertasi_id' => $this->disertasiId,
                'lecturer_id' => $this->lecturer_id,
                'position' => $this->position,
                'approve' => 1,
            ]);

            session()->flash('info', $this->lecturerId ? 'Dosen Update Successfully' : 'Dosen Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->lecturerId = '';
        $this->lecturer_id = '';
        $this->position = '';
    }

    public function edit($id){
        $lecturer = DisertasiLecturer::findOrFail($id);
        $this->lecturerId = $id;
        $this->lecturer_id = $lecturer->lecturer_id;
        $this->position = $lecturer->position;
        $this->showModal();
    }

    public function delete($id){
        try{
            DisertasiLecturer::find($id)->delete();
            session()->flash('delete','Dosen Successfully Deleted');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }

    }

    public function back(){
        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }
}
