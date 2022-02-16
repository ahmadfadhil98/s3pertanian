<?php

namespace App\Http\Livewire;

use App\Models\DisertasiTopic;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use stdClass;

class Diagram extends Component
{
    public $status;
    public $students;
    public $jumlah = [];

    public function render()
    {

        $topics = Student::select('beasiswa as name')->distinct()->get();
        $label = [];

        foreach($topics as $topic){
            if($topic->name){
                $label[] = $topic->name;
            }
        }

        $studentYear = Student::get();
        $tahun = [];

        foreach($studentYear as $year){
            $i = '20'.substr($year->nim,0,2);
            if(!in_array($i,$tahun)){
                $tahun[] = $i;
            }
        }
        if($this->status){
            $this->students = Student::where('status',$this->status)->select(DB::raw('SUBSTRING(nim,1,2) as tahun'),DB::raw('sum(SUBSTRING(nim,1,2)) as jumlah'))->groupBy('tahun')->get();
        }else{
            $this->students = Student::select(DB::raw('SUBSTRING(nim,1,2) as tahun'),DB::raw('count(SUBSTRING(nim,1,2)) as jumlah'))->groupBy('tahun')->get();
        }

        foreach($this->students as $student){
            $this->jumlah[] = $student->jumlah;
        }

        $datajson = new stdClass();

        $item = new stdClass();

        $subitem = new stdClass();

        $item->label = $tahun;

        $dasubitem = new stdClass();
        $dasubitem->jumlah = Student::count();
        $jmlh_mhs = [];
        foreach($this->students as $student){
            $jmlh_mhs[] = $student->jumlah;
        }
        $dasubitem->masuk = $jmlh_mhs;

        $students = Student::where('status','L')->select(DB::raw('SUBSTRING(nim,1,2) as tahun'),DB::raw('count(SUBSTRING(nim,1,2)) as jumlah'))->groupBy('tahun')->get();
        $mhs_jml = [];
        foreach($tahun as $key=>$tem){
            foreach($students as $student){
                if(substr($tem,2,4) == $student->tahun){
                    $mhs_jml[$key] = $student->jumlah;
                    break;
                }else{
                    $mhs_jml[$key] = 0;
                }
            }
        }
        $dasubitem->wisuda = $mhs_jml;
        $subitem->data = $dasubitem;
        $item->all = $subitem;

        $subitem = new stdClass();
        $dasubitem = new stdClass();
        $dasubitem->jumlah = Student::where('beasiswa','!=',null)->count();
        $students = Student::where('beasiswa','!=',null)->select(DB::raw('SUBSTRING(nim,1,2) as tahun'),DB::raw('count(SUBSTRING(nim,1,2)) as jumlah'))->groupBy('tahun')->get();
        $jmlh_mhs = [];
        foreach($tahun as $key=>$tem){
            foreach($students as $student){
                if(substr($tem,2,4) == $student->tahun){
                    $jmlh_mhs[$key] = $student->jumlah;
                    break;
                }else{
                    $jmlh_mhs[$key] = 0;
                }
            }
        }
        $dasubitem->masuk = $jmlh_mhs;

        $students = Student::where('beasiswa','!=',null)->where('status','L')->select(DB::raw('SUBSTRING(nim,1,2) as tahun'),DB::raw('count(SUBSTRING(nim,1,2)) as jumlah'))->groupBy('tahun')->get();
        $mhs_jml = [];
        foreach($tahun as $key=>$tem){
            foreach($students as $student){
                if(substr($tem,2,4) == $student->tahun){
                    $mhs_jml[$key] = $student->jumlah;
                    break;
                }else{
                    $mhs_jml[$key] = 0;
                }
            }
        }
        $dasubitem->wisuda = $mhs_jml;
        $subitem->data = $dasubitem;
        $item->beasiswa = $subitem;

        $datajson->dates = $item;
        // dd($datajson);
        if(Auth::user()){
            return view('dashboard');
        }else{
            return view('livewire.diagram',[
                'topics' => $topics,
                'label' => $label,
                'tahun' => $tahun,
                'datajson' => $datajson,
            ]);
        }
    }

    public function totalMasuk(){
        $this->status = null;
    }

    public function totalWisuda(){
        $this->status = 'L';
    }
}
