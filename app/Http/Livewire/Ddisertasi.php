<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Ddisertasi extends Component
{
    public $isOpen;
    public $disertasiId;
    public $title,$student_id,$topic_id;
    public $user;

    public function mount($id){
        $this->disertasiId = $id;
    }

    public function render()
    {
        $this->user = Auth::user();
        $proses_disertasis = ProsesDisertasi::all();
        $students = Student::pluck('name','id');
        $topics = DisertasiTopic::pluck('name','id');
        $lecturers = DisertasiLecturer::where('disertasi_id',$this->disertasiId);
        $disertasi = Disertasi::find($this->disertasiId);
        $name = Lecturer::pluck('name','id');
        return view('livewire.disertasi.detail',[
            'proses_disertasis' => $proses_disertasis,
            'lecturers' => $lecturers,
            'students' => $students,
            'topics' => $topics,
            'disertasi' => $disertasi,
            'name' => $name
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function editdisertasi(){
        $disertasi = Disertasi::find($this->disertasiId);
        $this->title = $disertasi->title;
        $this->student_id = $disertasi->student_id;
        $this->topic_id = $disertasi->topic_id;
        $this->showModal();
    }
}
