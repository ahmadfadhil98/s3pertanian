<?php

namespace App\Http\Livewire;

use App\Models\Academic;
use App\Models\Marking;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailAcademic extends Component
{
    public $user,$markingId,$disertasiId,$academicId,$type,$prodisId,$isOpen,$acId;
    public $keterangan,$grade,$score;

    public function mount($di,$did,$id){
        $this->type = $di;
        $this->disertasiId = $did;

        if($di==1){
            $this->academicId = $id;
        }else{
            $this->prodisId = $id;
        }
    }

    public function render()
    {
        $this->user = Auth::user();
        if($this->academicId){
            $academic = Academic::find($this->academicId);

            return view('livewire.detail_academic.index',[
                'academic' => $academic
            ]);
        }

        if($this->prodisId){
            $academics = Academic::where('proses_disertasi_id',$this->prodisId)->where('disertasi_id',$this->disertasiId)->where('type',2)->paginate(6);
            $mark = Marking::where('lecturer_id',$this->user->id)->get();
            // dd($this->prodisId);
            return view('livewire.detail_academic.index_link',[
                'academics' => $academics,
                'mark' => $mark
            ]);
        }

    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->markingId = '';
        $this->topicId = '';
        $this->name = '';
        $this->isOpen = false;
        if($this->type==1){
            return redirect()->to('/dacademic/'.$this->type.'/'.$this->disertasiId.'/'.$this->academicId);
        }
    }

    public function store(){
        $this->validate(
            [
                'score' => 'required',
            ]
        );

        $this->grade();

        if($this->type==1){
            try {
            // dd($this->topicId);
                Marking::updateOrCreate(['id' => $this->markingId], [
                    'academic_id' => $this->academicId,
                    'score' => $this->score,
                    'lecturer_id' => $this->user->id,
                    'grade' =>  $this->grade,
                    'keterangan' => $this->keterangan
                ]);


                session()->flash('info', $this->topicId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );

            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    session()->flash('delete', 'Kesalahan Input');
                }
            }
        }else{
            try {
            // dd($this->topicId);
                Marking::updateOrCreate(['id' => $this->markingId], [
                    'academic_id' => $this->acId,
                    'score' => $this->score,
                    'lecturer_id' => $this->user->id,
                    'grade' =>  $this->grade,
                    'keterangan' => $this->keterangan
                ]);


                session()->flash('info', $this->topicId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );

            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    session()->flash('delete', 'Kesalahan Input');
                }
            }
        }

        $this->hideModal();

        $this->markingId = '';
        $this->topicId = '';
        $this->name = '';
    }

    public function grade(){
        if($this->score>=85){
            $this->grade = 'A';
        }elseif($this->score>=80||$this->score<85){
            $this->grade = 'A-';
        }elseif($this->score>=75||$this->score<80){
            $this->grade = 'B+';
        }elseif($this->score>=70||$this->score<75){
            $this->grade = 'B';
        }elseif($this->score>=65||$this->score<70){
            $this->grade = 'B-';
        }elseif($this->score>=60||$this->score<65){
            $this->grade = 'C+';
        }elseif($this->score>=55||$this->score<60){
            $this->grade = 'C';
        }elseif($this->score>=50||$this->score<55){
            $this->grade = 'C-';
        }elseif($this->score>=40||$this->score<50){
            $this->grade = 'D';
        }elseif($this->score<40){
            $this->grade = 'E';
        }
    }
}
