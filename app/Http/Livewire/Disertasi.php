<?php

namespace App\Http\Livewire;

use App\Models\Disertasi as ModelsDisertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Disertasi extends Component
{
    public $isOpen,$isOpen2,$isDel,$delId;
    public $disertasiId,$title,$student_id,$topic_id;
    public $lecturer1 = 0;
    public $lecturer2 = 0;
    public $lecturer3 = 0;
    public $lecturer4 = 0;
    public $lecturers;
    public $lecturers2 = [];
    public $lecturers3 = [];
    public $lecturers4 = [];
    public $user;

    public function render()
    {
        $this->user = Auth::user();
        $user = $this->user;
        $disertasis = ModelsDisertasi::all();
        $students = Student::pluck('name','id');
        $topics = DisertasiTopic::pluck('name','id');
        $icons = config('central.icon');
        $statuses = config('central.status');
        $this->lecturers = Lecturer::pluck('name','id');
        $lecturer = DisertasiLecturer::get();
        // dd($lecturer);
        return view('livewire.disertasi.index',[
            'disertasis' => $disertasis,
            'students' => $students,
            'topics' => $topics,
            'icons' => $icons,
            'lecturer' => $lecturer,
            'lecturers' => $this->lecturers,
            'lecturers2' => $this->lecturers2,
            'lecturers3' => $this->lecturers3,
            'lecturers4' => $this->lecturers4,
            'user' => $user,
            'statuses' => $statuses
        ]);
    }

    public function onChange(){
        $this->lecturers2 = Lecturer::whereNotIn('id',
        [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4])->pluck('name','id');
    }

    public function onChange2(){
        $this->lecturers3 = Lecturer::whereNotIn('id',
        [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4])->pluck('name','id');
    }

    public function onChange3(){
        $this->lecturers4 = Lecturer::whereNotIn('id',
        [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4])->pluck('name','id');
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
        $dosens = [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4];
        $no = 1;
        if($this->user->type==1){
            $this->validate(
                [
                    'student_id' => 'required',
                ]
            );

            try {
                $disertasi = ModelsDisertasi::updateOrCreate(['id' => $this->disertasiId], [
                    'title' => $this->title,
                    'student_id' => $this->student_id,
                    'topic_id' => $this->topic_id,
                    'status' => 1
                ]);

                foreach($dosens as $dosen){
                    // dd($dosen);
                    if($dosen!=0){
                        $disertasi->disertasi_lecturer()->create([
                            'lecturer_id' => $dosen,
                            'position' => $no,
                            'approve' => 1
                        ]);
                        $no++;
                    }
                }

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
                    'topic_id' => 'required'
                ]
            );

            try {
                // dd($this->disertasiId);
                $disertasi = ModelsDisertasi::updateOrCreate(['id' => $this->disertasiId], [
                    'title' => $this->title,
                    'student_id' => $this->user->id,
                    'topic_id' => $this->topic_id,
                    'status' => 1
                ]);

                foreach($dosens as $dosen){
                    // dd($dosen);
                    if($dosen!=0){
                        $disertasi->disertasi_lecturer()->create([
                            'lecturer_id' => $dosen,
                            'position' => $no,
                            'approve' => 1
                        ]);
                        $no++;
                    }
                }

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
