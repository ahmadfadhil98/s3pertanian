<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class DiagramController extends Controller
{
    public function index(){
        // $datajson = new stdClass();

        // $item = new stdClass();

        // $subitem = new stdClass();
        // $subitem->total = 102831;
        // $subitem->upDown = 2.2;

        // $dsubitem = new stdClass();
        // $dsubitem->labels = ["12am", "1am", "2am", "3am", "4am", "5am", "6am", "7am", "8am", "9am", "10am", "11am", "12pm", "1pm", "2pm", "3pm", "4pm", "5pm", "6pm", "7pm", "8pm", "9pm", "10pm", "11pm"];
        // $dsubitem->income = [4450, 4086, 3794, 4659, 4194, 4144, 3973, 3813, 4607, 4194, 4753, 4043, 3851, 4280, 4490, 4956, 4580, 3927, 4094, 4379, 4254, 4539, 3777, 4994];
        // $dsubitem->expenses = [1157, 449, 835, 1631, 671, 1202, 1311, 1640, 1843, 839, 2234, 1294, 809, 1241, 1437, 694, 1145, 785, 2006, 788, 893, 1271, 1058, 1798];
        // $subitem->data = $dsubitem;
        // $item->today = $subitem;

        // $subitem = new stdClass();
        // $subitem->total = 213180;
        // $subitem->upDown = 1;

        // $dsubitem = new stdClass();
        // $dsubitem->labels = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
        // $dsubitem->income = [33120, 31578, 31549, 26435, 26307, 33391, 30800];
        // $dsubitem->expenses = [12254, 12947, 4417, 7137, 12364, 3339, 11704];
        // $subitem->data = $dsubitem;
        // $item->week = $subitem;

        // $subitem = new stdClass();
        // $subitem->total = 3982743;
        // $subitem->upDown = 1.3;

        // $dsubitem = new stdClass();
        // $dsubitem->labels = ["1st", "2nd", "3rd", "4th", "5th", "6th", "7th", "8th", "9th", "10th", "11th", "12th", "13th", "14th", "15th", "16th", "17th", "18th", "19th", "20th", "21st", "22nd", "23rd", "24th", "25th", "26th", "27th", "28th", "29th", "30th"];
        // $dsubitem->income =  [141010, 115138, 133009, 129413, 146080, 116199, 126854, 146997, 129636, 143285, 129345, 136018, 138606, 140743, 146910, 132684, 122024, 145827, 125049, 137724, 130477, 122255, 133749, 130146, 118660, 126728, 124164, 142161, 142976, 128876];
        // $dsubitem->expenses = [52174, 52963, 22612, 63412, 17530, 20916, 54547, 47039, 25927, 55881, 62086, 31284, 29107, 36593, 16160, 31844, 39048, 23332, 32513, 27545, 45667, 18338, 30762, 40345, 46277, 58295, 32283, 66816, 48612, 18043];
        // $subitem->data = $dsubitem;
        // $item->month = $subitem;

        // $subitem = new stdClass();
        // $subitem->total = 790546;
        // $subitem->upDown = -1;

        // $dsubitem = new stdClass();
        // $dsubitem->labels = ["Feb", "Mar", "Apr", "May", "Jun", "Jul"];
        // $dsubitem->income =  [129086, 114855, 138390, 141537, 122422, 144256];
        // $dsubitem->expenses = [28399, 51685, 65043, 50953, 23260, 28851];
        // $subitem->data = $dsubitem;
        // $item->halfYear = $subitem;

        // $subitem = new stdClass();
        // $subitem->total = 1586266;
        // $subitem->upDown = 9.8;

        // $dsubitem = new stdClass();
        // $dsubitem->labels = ["Aug", "Sep", "Oct", "Nov", "Dec", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"];
        // $dsubitem->income =  [119081, 122160, 146259, 147543, 116608, 141801, 137770, 125591, 146268, 114010, 136872, 132303];
        // $dsubitem->expenses = [51205, 42756, 42415, 29509, 54806, 55302, 66130, 38933, 17552, 49024, 26006, 64828];
        // $subitem->data = $dsubitem;
        // $item->year = $subitem;

        // $datajson->dates = $item;

        $studentYear = Student::get();
        $tahun = [];

        foreach($studentYear as $year){
            $i = '20'.substr($year->nim,0,2);
            if(!in_array($i,$tahun)){
                $tahun[] = $i;
            }
        }

        $datajson = new stdClass();

        $item = new stdClass();

        $subitem = new stdClass();

        $item->label = $tahun;

        $dasubitem = new stdClass();
        $subitem->jumlah = Student::count();
        $students = Student::select(DB::raw('SUBSTRING(nim,1,2) as tahun'),DB::raw('count(SUBSTRING(nim,1,2)) as jumlah'))->groupBy('tahun')->get();
        $jmlh_mhs = [];
        foreach($students as $student){
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
        $subitem->jumlah = Student::where('beasiswa','!=',null)->count();
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

        return response()->json($datajson);
    }

}
