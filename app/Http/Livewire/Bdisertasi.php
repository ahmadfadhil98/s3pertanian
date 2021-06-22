<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Bdisertasi extends Component
{
    public $user;

    public function render()
    {
        $this->user = Auth::user();
        $students = DisertasiLecturer::paginate(7);
        $student = Student::pluck('name','id');
        $disertasi = Disertasi::pluck('id','student_id');
        return view('livewire.disertasi.bdisertasi',[
            'students' => $students,
            'student' => $student,
            'disertasi' => $disertasi
        ]);
    }
}
