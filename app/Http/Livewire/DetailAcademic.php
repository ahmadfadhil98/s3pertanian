<?php

namespace App\Http\Livewire;

use App\Models\Academic;
use App\Models\Marking;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailAcademic extends Component
{
    public $user,$academicId,$type,$prodisId,$isOpen;
    public $keterangan,$grade,$score;

    public function mount($di,$id){
        $this->type = $di;
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
        }

        if($this->prodisId){
            $academic = Academic::where('proses_disertasi_id',$this->prodisId)->paginate(6);
        }

        return view('livewire.detail_academic.index',[
            'academic' => $academic
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->isOpen = false;
        return redirect()->to('/dacademic/'.$this->type.'/'.$this->academicId);
    }

    public function store(){

        $this->validate(
            [
                'score' => 'required',
            ]
        );

        $this->grade();

        try {
            // dd($this->topicId);
            $mark = Marking::updateOrCreate(['id' => $this->markingId], [
                'academic_id' => $this->academicId,
                'score' => $this->score,
                'lecturer_id' => $this->user->id,
                'grade' =>  $this->grade,
                'keterangan' => $this->keterangan
            ]);


            session()->flash('info', $this->topicId ? 'Topik Update Successfully' : 'Topik Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

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
