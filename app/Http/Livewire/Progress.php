<?php

namespace App\Http\Livewire;

use App\Models\Progress as ModelsProgress;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Progress extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $prosesId,$student_id;
    public $mahasiswa;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $progress = ModelsProgress::select('student_id')->distinct()->paginate(6);
        $progMat = ModelsProgress::get();
        $matkuls = ProsesDisertasi::select(DB::raw("CONCAT('kode',' ','name') AS display_name"),'id')->pluck('display_name','id');
        $students = Student::where('status','A')->pluck('name','id');
        return view('livewire.progress.index',[
            'progress' => $progress,
            'progMat' => $progMat,
            'students' => $students,
            'matkuls' => $matkuls
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal(){
        $this->isOpen = false;
    }

    public function store(){
        $this->validate([
            'student_id' => 'required',
            'prosesId' => 'required'
        ]);

        foreach($this->prosesId as $key=>$proses){
            ModelsProgress::create([
                'student_id' => $this->student_id,
                'proses_disertasi_id' => $proses
            ]);
        }

        $this->hideModal();
    }
}
