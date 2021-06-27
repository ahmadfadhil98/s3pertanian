<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Response;

class Bdisertasi extends Component
{
    use WithPagination;
    public $user;
    public $isOpen,$isDel,$delId;

    public function render()
    {
        abort_if(Gate::denies('lecturer_manage_bimbingan'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->user = Auth::user();
        $students = DisertasiLecturer::where('lecturer_id',$this->user->id)->select('id','disertasi_id','approve')->distinct()->paginate(3);
        $stu_name = Student::pluck('name','id');
        $stu_nim = Student::pluck('nim','id');
        $lecturer = Lecturer::pluck('name','id');
        $disertasi = Disertasi::pluck('title','id');
        $dis_stu = Disertasi::pluck('student_id','id');
        $statuses = config('central.status');

        return view('livewire.disertasi.bdisertasi',[
            'students' => $students,
            'stu_name' => $stu_name,
            'stu_nim' => $stu_nim,
            'disertasi' => $disertasi,
            'statuses' => $statuses,
            'lecturer' => $lecturer,
            'dis_stu' => $dis_stu
        ]);
    }

    public function agree($id){
        // dd($id);
        $disertasi = DisertasiLecturer::find($id);
        $disertasi->update([
            'approve' => 2
        ]);
    }

    public function reject($id){
        $disertasi = DisertasiLecturer::find($id);
        $disertasi->update([
            'approve' => 3
        ]);
    }

}
