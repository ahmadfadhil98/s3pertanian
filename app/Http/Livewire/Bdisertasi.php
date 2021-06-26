<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Bdisertasi extends Component
{
    use WithPagination;
    public $user;
    public $isOpen,$isDel,$delId;

    public function render()
    {
        $this->user = Auth::user();
        $students = DisertasiLecturer::select('disertasi_id','approve')->distinct()->paginate(3);
        $stu_name = Student::pluck('name','id');
        $stu_nim = Student::pluck('nim','id');
        $lecturer = Lecturer::pluck('name','id');
        $dis_stu = Disertasi::pluck('student_id','id');
        $statuses = config('central.status');

        return view('livewire.disertasi.bdisertasi',[
            'students' => $students,
            'stu_name' => $stu_name,
            'stu_nim' => $stu_nim,
            'statuses' => $statuses,
            'lecturer' => $lecturer,
            'dis_stu' => $dis_stu
        ]);
    }
}
