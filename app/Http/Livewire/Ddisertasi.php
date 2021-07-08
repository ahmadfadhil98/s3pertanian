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
use Illuminate\Support\Facades\Hash;
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
    public $content,$academicId;
    public $isDel,$delId,$idDel,$filup;

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

        $dateac = Academic::orderByDesc('updated_at')->first();
        $hashtag = 0;
        $proses_disertasis = ProsesDisertasi::all();
        $academics = Academic::where('disertasi_id',$this->disertasiId)->get();
        $c_academic = DB::table('academics')->where('disertasi_id',$this->disertasiId)->select(DB::raw('count(*) as count,type, proses_disertasi_id'))->groupBy('proses_disertasi_id','type')
        ->get();

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

            'proses_disertasis' => $proses_disertasis,
            'academics' => $academics,
            'c_academic' => $c_academic,
            'hashtag' => $hashtag,
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

    public function academic($id,$di){
        $this->pd = ProsesDisertasi::find($id);
        $this->type = $di;
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
            // dd($this->topic_id);
            Disertasi::updateOrCreate(['id' => $this->disertasiId], [
                'title' => $this->title,
                'student_id' => $this->student_id,
                'topic_id' => $this->topic_id,
                'status' => 1
            ]);

            session()->flash('info', $this->disertasiId ? 'Berhasil Diedit' : 'Berhasil Ditambah' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
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


            session()->flash('info', $this->academicId ? $this->pd->name.'Berhasil Diedit' : $this->pd->name.' Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
            }
        }

        return redirect()->to('/ddisertasi/'.$this->disertasiId);
    }

    public function download($id) {
        $file = Academic::find($id);
        return Storage::download($file->link_upload,$file->keterangan);
    }

    public function delete($id,$di){
        // dd($id);
        try{
            if($di==1){
                $file = Academic::find($id);
                Storage::delete($file->keterangan);
                $file->delete();
            }else{
                Academic::find($id)->delete();
            }
            session()->flash('delete','Berhasil Dihapus');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }
    }
}
