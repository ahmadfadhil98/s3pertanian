<?php

namespace App\Http\Livewire;

use App\Models\Disertasi as ModelsDisertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\ProsesDisertasi;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class Disertasi extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $disertasiId,$title,$student_id,$topic_id;
    public $lecturer1 = 0;
    public $lecturer2 = 0;
    public $lecturer3 = 0;
    public $lecturer4 = 0;
    public $lecturers;
    public $lecturers2 = [];
    public $lecturers3 = [];
    public $lecturers4 = [];
    public $user;

    public function render()
    {
        $this->user = Auth::user();
        $user = $this->user;
        $searchParam = '%'.$this->search.'%';


        if($user->type==1){
            $disertasis = DB::table('disertasis')->join('students','students.id','=','disertasis.student_id')->select('disertasis.id','student_id','name','nim','topic_id','title','disertasis.status')->where('name','like',$searchParam)->orWhere('nim','like',$searchParam)->orWhere('title','like',$searchParam)->paginate(5);
        }else{
            $disertasis = DB::table('disertasis')->join('students','students.id','=','disertasis.student_id')->select('disertasis.id','student_id','name','nim','topic_id','title','disertasis.status')->where('student_id',$user->id)->paginate(5);
        }
        $students = Student::pluck('name','id');
        $topics = DisertasiTopic::pluck('name','id');
        $icons = config('central.icon');
        $colors = config('central.colorIcon');
        $statuses = config('central.status');
        $this->lecturers = Lecturer::pluck('name','id');
        $lecturer = DisertasiLecturer::orderBy('position')->get();

        return view('livewire.disertasi.index',[
            'disertasis' => $disertasis,
            'students' => $students,
            'topics' => $topics,
            'icons' => $icons,
            'colors' => $colors,
            'lecturer' => $lecturer,
            'lecturers' => $this->lecturers,
            'lecturers2' => $this->lecturers2,
            'lecturers3' => $this->lecturers3,
            'lecturers4' => $this->lecturers4,
            'user' => $user,
            'statuses' => $statuses
        ]);
    }

    public function onChange(){
        $this->lecturers2 = Lecturer::whereNotIn('id',
        [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4])->pluck('name','id');
    }

    public function onChange2(){
        $this->lecturers3 = Lecturer::whereNotIn('id',
        [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4])->pluck('name','id');
    }

    public function onChange3(){
        $this->lecturers4 = Lecturer::whereNotIn('id',
        [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4])->pluck('name','id');
    }

    public function showModal() {
        // dd($this->user->type);
        if($this->user->type==3){
            $cekdis = ModelsDisertasi::where('student_id',$this->user->id)->where('status','!=',3)->get();
            if($cekdis->count()==1){
                $this->emit('saved');
                session()->flash('delete', 'Anda Sudah Memiliki Disertasi');
            }else{
                $this->isOpen = true;
            }
        }else{
            $this->isOpen = true;
        }

    }

    public function hideModal() {
        $this->disertasiId = '';
        $this->title = '';
        $this->student_id = '';
        $this->isOpen = false;
    }

    public function showDel($id) {
        $this->delId = $id;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->isDel = false;
    }

    public function store(){
        $dosens = [$this->lecturer1,$this->lecturer2,$this->lecturer3,$this->lecturer4];
        $no = 1;
        if($this->user->type==1){
            $this->validate(
                [
                    'student_id' => 'required',
                ]
            );
            $cekdis = ModelsDisertasi::where('student_id',$this->student_id)->where('status','!=',3)->get();
            if($cekdis->count()==1){
                session()->flash('delete', 'Mahasiswa Ini Sudah Memiliki Disertasi');
            }else{
                try {
                    $disertasi = ModelsDisertasi::updateOrCreate(['id' => $this->disertasiId], [
                        'title' => $this->title,
                        'student_id' => $this->student_id,
                        'topic_id' => $this->topic_id,
                        'status' => 1
                    ]);

                    foreach($dosens as $dosen){
                        if($dosen!=0){
                            $disertasi->disertasi_lecturer()->create([
                                'lecturer_id' => $dosen,
                                'position' => $no,
                                'approve' => 1
                            ]);
                            $no++;
                        }
                    }
                    $this->emit('saved');
                    session()->flash('info', $this->disertasiId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );

                } catch (QueryException $e){
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        $this->emit('saved');
                        session()->flash('delete', 'Kesalahan Input');
                    }
                }
            }

        }elseif($this->user->type==3){

            $this->validate(
                [
                    'topic_id' => 'required'
                ]
            );

            try {
                // dd($this->disertasiId);
                $disertasi = ModelsDisertasi::updateOrCreate(['id' => $this->disertasiId], [
                    'title' => $this->title,
                    'student_id' => $this->user->id,
                    'topic_id' => $this->topic_id,
                    'status' => 1
                ]);

                foreach($dosens as $dosen){
                    // dd($dosen);
                    if($dosen!=0){
                        $disertasi->disertasi_lecturer()->create([
                            'lecturer_id' => $dosen,
                            'position' => $no,
                            'approve' => 1
                        ]);
                        $no++;
                    }
                }
                $this->emit('saved');
                session()->flash('info', $this->disertasiId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );

            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    $this->emit('saved');
                    session()->flash('delete', 'Kesalahan Input');
                }
            }
        }

        $this->hideModal();
        $this->disertasiId = '';
        $this->title = '';
        $this->student_id = '';
    }

    public function edit($id){
        $disertasi = ModelsDisertasi::findOrFail($id);
        $this->disertasiId = $id;
        $this->title = $disertasi->title;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsDisertasi::find($id)->delete();
            session()->flash('delete','Berhasil Dihapus');
            $this->emit('saved');
            $this->hideDel();
        }catch(QueryException $e){
            $this->emit('saved');
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }

    }
}
