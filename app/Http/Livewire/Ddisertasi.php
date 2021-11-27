<?php

namespace App\Http\Livewire;

use App\Models\Academic;
use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\Marking;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Ddisertasi extends Component
{
    use WithFileUploads;

    public $isOpen,$isOpenAcademic;
    public $disertasiId;
    public $title,$student_id,$topic_id;
    public $user;
    public $pd,$keterangan;
    public $content,$academicId;
    public $isDel,$delId,$idDel,$filup;
    public $type;

    public function mount($id){

        $this->disertasiId = $id;
    }

    public function render()
    {
        $this->user = Auth::user();
        $icons = config('central.icon');
        $disertasis = Disertasi::find($this->disertasiId);
        $students = Student::pluck('name','id');
        $nim = Student::pluck('nim','id');
        $topics = DisertasiTopic::pluck('name','id');
        $statuses = config('central.status');
        $colors = config('central.colorIcon');

        $dateac = Academic::where('disertasi_id',$this->disertasiId)->orderByDesc('updated_at')->get();
        $tag = 0;
        $aca = Academic::count();
        $proses_disertasis = ProsesDisertasi::all();
        $f_academics = Academic::where('disertasi_id',$this->disertasiId)->where('type','F')->get();
        $l_academics = Academic::where('disertasi_id',$this->disertasiId)->where('type','L')->get();
        $c_academic = DB::table('proses_disertasis')->leftJoin('academics','proses_disertasis.id','=','academics.proses_disertasi_id')->where('disertasi_id',$this->disertasiId)->select(DB::raw('count(proses_disertasi_id) as count, proses_disertasis.id,academics.disertasi_id'))->groupBy('proses_disertasis.id','disertasi_id')->get();
        // dd($c_academic);
        $ketac = Academic::pluck('keterangan','id');

        $lecturers = DisertasiLecturer::where('disertasi_id',$this->disertasiId)->orderBy('position')->get();
        $name = Lecturer::pluck('name','id');
        $approved = DisertasiLecturer::where('disertasi_id',$this->disertasiId)->where('approve',1)->get();
        return view('livewire.disertasi.detail.index',[
            'disertasis' => $disertasis,
            'students' => $students,
            'topics' => $topics,
            'nim' => $nim,
            'statuses' => $statuses,
            'icons' => $icons,
            'colors' => $colors,

            'aca' => $aca,
            'proses_disertasis' => $proses_disertasis,
            'f_academics' => $f_academics,
            'l_academics' => $l_academics,
            'c_academic' => $c_academic,
            'tag' => $tag,
            'dateac' => $dateac,
            'ketac' => $ketac,

            'lecturers' => $lecturers,
            'name' => $name,
            'approved' => $approved
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

    public function academic($id,$type){
        $this->pd = ProsesDisertasi::find($id);
        $this->type = $type;
        $this->showModal2();

    }

    public function showDel($id,$di) {
        $this->delId = $id;
        $this->idDel = $di;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->isDel = false;
    }

    public function store(){

        try {
            Disertasi::updateOrCreate(['id' => $this->disertasiId], [
                'title' => $this->title,
                'student_id' => $this->student_id,
                'topic_id' => $this->topic_id,
                'status' => 1
            ]);
            $this->emit('saved');
            session()->flash('info', $this->disertasiId ? 'Berhasil Diedit' : 'Berhasil Ditambah' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $this->emit('saved');
                session()->flash('delete', 'Kesalahan Input');
            }
        }

        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }

    public function storeacademic(){

        $countprodis = Academic::where('proses_disertasi_id',$this->pd->id)->where('disertasi_id',$this->disertasiId)->where('type',$this->type)->count();

        try {

            $this->validate(
                [
                    'content' => 'required|url',
                ]
            );
            if($this->type=="F"){
                $file = $this->content->store('files/prodis');
                $filename = $this->content->getClientOriginalName();
            }else{
                $file = $this->content;
                $filename = $this->content;
            }

            // dd($this->keterangan);
            Academic::updateOrCreate(['id' => $this->academicId], [
                'proses_disertasi_id' => $this->pd->id,
                'type' => $this->type,
                'no'   => $countprodis+1,
                'disertasi_id' => $this->disertasiId,
                'file_link' => $filename,
                'path' => $file,
                'keterangan' => $this->keterangan
            ]);

            $this->emit('saved');
            session()->flash('info', $this->academicId ? $this->pd->name.'Berhasil Diedit' : $this->pd->name.' Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $this->emit('saved');
                session()->flash('delete', 'Kesalahan Input');
            }
        }

        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }

    public function download($id) {
        $file = Academic::find($id);
        return Storage::download($file->path,$file->file);
    }

    public function delete($id,$di){
        // dd($id);
        try{
            if($di==1){
                $file = Academic::find($id);
                Storage::delete($file->path);
                $file->delete();
            }else{
                Academic::find($id)->delete();
            }
            $this->emit('saved');
            session()->flash('delete','Berhasil Dihapus');
            $this->hideDel();
        }catch(QueryException $e){
            $this->emit('saved');
            session()->flash('delete', 'Tidak Bisa Menghapus');
        }
    }
}
