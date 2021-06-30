<?php

namespace App\Http\Livewire;

use App\Models\Academic;
use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class Ddisertasi extends Component
{
    use WithFileUploads;

    public $isOpen,$isOpenAcademic,$isDProdis;
    public $disertasiId;
    public $title,$student_id,$topic_id;
    public $user;
    public $pd,$type,$keterangan;
    public $types='text';
    public $disabled = 'disabled';
    public $content,$academicId,$prodis,$isAC,$isMark,$isDel,$delId,$idDel;

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

        $hashtag = 0;
        $proses_disertasis = ProsesDisertasi::all();
        $academics = Academic::where('disertasi_id',$this->disertasiId)->get();
        $c_academic = DB::table('academics')->select(DB::raw('count(*) as count,type, proses_disertasi_id'))->groupBy('proses_disertasi_id','type')
        ->get();
        // dd($c_academic);
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
            'c_academic' => $c_academic,
            'c_link' => $c_link,
            'hashtag' => $hashtag,
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
        $this->content = '';
        $this->keterangan = '';
    }

    public function editdisertasi(){
        $disertasi = Disertasi::find($this->disertasiId);
        $this->title = $disertasi->title;
        $this->student_id = $disertasi->student_id;
        $this->topic_id = $disertasi->topic_id;
        $this->showModal();
    }

    public function academic($id,$di){
        $this->pd = ProsesDisertasi::find($id);
        $this->type = $di;
        $this->showModal2();

    }

    public function showAC(){
        $this->isAC = true;
    }

    public function hideAC(){
        $this->isAC = false;
    }

    public function showMark(){
        $this->isMark = true;
    }

    public function hideMark(){
        $this->isMark = false;
        $this->showAC();
    }

    public function showDel($id,$di) {
        $this->hideAC();
        $this->delId = $id;
        $this->idDel = $di;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->showAC();
        $this->isDel = false;
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
        // dd($this->content);

        $countprodis = Academic::where('proses_disertasi_id',$this->pd->id)->where('disertasi_id',$this->disertasiId)->where('type',$this->type)->count();

        try {

            if($this->type==1){

                $this->validate(
                    [
                        'content' => 'required',
                    ]
                );

                $file = $this->content->store('files/prodis');
                $filename = $this->content->getClientOriginalName();
                Academic::updateOrCreate(['id' => $this->academicId], [
                    'proses_disertasi_id' => $this->pd->id,
                    'type' => $this->type,
                    'no'   => $countprodis+1,
                    'disertasi_id' => $this->disertasiId,
                    'link_upload' => $file,
                    'keterangan' => $filename,
                ]);
            }
            else{

                $this->validate(
                    [
                        'content' => 'required',
                        'keterangan' => 'required'
                    ]
                );
                Academic::updateOrCreate(['id' => $this->academicId], [
                    'proses_disertasi_id' => $this->pd->id,
                    'type' => $this->type,
                    'no'   => $countprodis+1,
                    'disertasi_id' => $this->disertasiId,
                    'link_upload' => $this->content,
                    'keterangan' => $this->keterangan,
                ]);
            }


            session()->flash('info', $this->academicId ? $this->pd->name.'Update Successfully' : $this->pd->name.' Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }

    public function download($id) {
        $file = Academic::find($id);
        return Storage::download($file->link_upload,$file->keterangan);
    }

    public function d_academic($id){
        $this->prodis = $id;
        $this->showAC();
    }

    public function marking($id) {
        $this->filup = $id;
        $this->hideAC();
        $this->showMark();
    }

    public function delete($id,$di){
        try{
            if($di==1){
                $file = Academic::find($id);
                Storage::delete($file->keterangan);
                $file->delete();
            }else{
                Academic::find($id)->delete();
            }
            session()->flash('delete','Dosen Successfully Deleted');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }
    }
}
