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

    public $isOpen,$isOpen2,$isDProdis;
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
        $proses_disertasis = ProsesDisertasi::all();
        $students = Student::pluck('name','id');
        $topics = DisertasiTopic::pluck('name','id');
        $lecturers = DisertasiLecturer::where('disertasi_id',$this->disertasiId)->get();
        $academics = Academic::where('disertasi_id',$this->disertasiId)->get();
        $c_file = Academic::where('disertasi_id',$this->disertasiId)->where('kode_proses_disertasi', 'like', '%F%')->count();
        $c_link = Academic::where('disertasi_id',$this->disertasiId)->where('kode_proses_disertasi', 'like', '%L%')->count();
        // dd($c_link);
        $statuses = config('central.status');
        $disertasis = Disertasi::find($this->disertasiId);
        $name = Lecturer::pluck('name','id');

        return view('livewire.disertasi.detail',[
            'proses_disertasis' => $proses_disertasis,
            'lecturers' => $lecturers,
            'students' => $students,
            'topics' => $topics,
            'disertasis' => $disertasis,
            'c_file' => $c_file,
            'c_link' => $c_link,
            'academics' => $academics,
            'statuses' => $statuses,
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
        $this->isOpen2 = true;
    }

    public function hideModal2() {
        $this->isOpen2 = false;
    }

    public function showDProdis() {
        $this->isDProdis = true;
    }

    public function hideDProdis() {
        $this->isDProdis = false;
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

        $countprodis = Academic::where('proses_disertasi_id',$this->pd->id)->where('disertasi_id',$this->disertasiId)->count();
        // dd($this->type);
        if($this->type==1){
            $char = 'F';
        }else{
            $char = 'L';
        }
        // dd($char.($countprodis+1));
        try {
            // dd($this->topic_id);
            Academic::updateOrCreate(['id' => $this->academicId], [
                'proses_disertasi_id' => $this->pd->id,
                'kode_proses_disertasi' => $char.($countprodis+1),
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

    public function dprodis($id){
        $this->prodis = $id;
        $this->showDProdis();
    }
}
