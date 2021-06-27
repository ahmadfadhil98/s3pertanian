<?php

namespace App\Http\Livewire;

use App\Models\Academic;
use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Ddisertasi extends Component
{
    use WithFileUploads;

    public $isOpen,$isOpenAcademic,$isDProdis;
    public $disertasiId;
    public $title,$student_id,$topic_id;
    public $user;
    public $pd,$type;
    public $types='text';
    public $disabled = 'disabled';
    public $content,$academicId,$prodis;

    public function mount($id){
        $this->disertasiId = $id;
    }

    public function render()
    {
        $this->user = Auth::user();

        $disertasis = Disertasi::find($this->disertasiId);
        $students = Student::pluck('name','id');
        $topics = DisertasiTopic::pluck('name','id');
        $statuses = config('central.status');

        $proses_disertasis = ProsesDisertasi::all();
        $academics = Academic::where('disertasi_id',$this->disertasiId)->get();
        $c_link = Academic::where('disertasi_id',$this->disertasiId)->where('type',2);
        $c_file = Academic::where('disertasi_id',$this->disertasiId)->where('type',1);

        $lecturers = DisertasiLecturer::where('disertasi_id',$this->disertasiId)->get();
        $name = Lecturer::pluck('name','id');

        return view('livewire.disertasi.detail',[
            'disertasis' => $disertasis,
            'students' => $students,
            'topics' => $topics,
            'statuses' => $statuses,

            'proses_disertasis' => $proses_disertasis,
            'academics' => $academics,
            'c_link' => $c_link,
            'c_file' => $c_file,

            'lecturers' => $lecturers,
            'name' => $name
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
    }

    public function showModal2() {
        $this->isOpenAcademic = true;
    }

    public function hideModal2() {
        $this->isOpenAcademic = false;
    }

    public function editdisertasi(){
        $disertasi = Disertasi::find($this->disertasiId);
        $this->title = $disertasi->title;
        $this->student_id = $disertasi->student_id;
        $this->topic_id = $disertasi->topic_id;
        $this->showModal();
    }

    public function academic($id){
        $this->pd = ProsesDisertasi::find($id);
        $this->showModal2();

    }

    public function store(){

        try {
            // dd($this->topic_id);
            Disertasi::updateOrCreate(['id' => $this->disertasiId], [
                'title' => $this->title,
                'student_id' => $this->student_id,
                'topic_id' => $this->topic_id,
                'status' => 1
            ]);

            session()->flash('info', $this->disertasiId ? 'Disertasi Update Successfully' : 'Disertasi Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }

    public function storeacademic(){

        $countprodis = Academic::where('proses_disertasi_id',$this->pd->id)->where('disertasi_id',$this->disertasiId)->where('type',$this->type)->count();

        try {
            // dd($this->topic_id);
            Academic::updateOrCreate(['id' => $this->academicId], [
                'proses_disertasi_id' => $this->pd->id,
                'type' => $this->type,
                'no'   => $countprodis+1,
                'disertasi_id' => $this->disertasiId,
                'link_upload' => $this->content
            ]);

            session()->flash('info', $this->academicId ? $this->pd->name.'Update Successfully' : $this->pd->name.' Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }

    public function type(){
        // dd($this->type);
        if($this->type==0){
            $this->disabled = 'disabled';
        }elseif($this->type==1){
            $this->types = 'file';
            $this->disabled = 'enabled';

        }else{
            $this->types = 'text';
            $this->disabled = 'enabled';
        }

    }

}
