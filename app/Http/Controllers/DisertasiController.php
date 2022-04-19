<?php

namespace App\Http\Controllers;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\DisertasiTopic;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisertasiController extends Controller
{
    public function create(){
        $user = Auth::user();


        if($user->type==1){
            $disertasis = DB::table('disertasis')->join('students','students.id','=','disertasis.student_id')->select('disertasis.id','student_id','name','nim','topic_id','title','disertasis.status')->paginate(5);
        }else{
            $disertasis = DB::table('disertasis')->join('students','students.id','=','disertasis.student_id')->select('disertasis.id','student_id','name','nim','topic_id','title','disertasis.status')->where('student_id',$user->id)->paginate(5);
        }
        $students = Student::pluck('name','id');
        $topics = DisertasiTopic::pluck('name','id');
        $icons = config('central.icon');
        $colors = config('central.colorIcon');
        $statuses = config('central.status');
        $lecturers = Lecturer::pluck('name','id');
        $lecturers2 = Lecturer::pluck('name','id');
        $lecturers3 = Lecturer::pluck('name','id');
        $lecturers4 = Lecturer::pluck('name','id');
        $lecturer = DisertasiLecturer::orderBy('position')->get();

        return view('livewire.disertasi.create',[
            'user' => $user,
            'disertasis' => $disertasis,
            'students' => $students,
            'topics' => $topics,
            'icons' => $icons,
            'colors' => $colors,
            'lecturer' => $lecturer,
            'lecturers' => $lecturers,
            'lecturers2' => $lecturers2,
            'lecturers3' => $lecturers3,
            'lecturers4' => $lecturers4,
            'user' => $user,
            'statuses' => $statuses
        ]);
    }

    public function store(Request $request){
        $dosens = [$request->lecturer1,$request->lecturer2,$request->lecturer3];
        $no = 1;
        $user = Auth::user();
        if($user->type==1){
            $this->validate($request,
                [
                    'student_id' => 'required',
                    'topic_id' => 'required',
                ]
            );
            $cekdis = Disertasi::where('student_id',$request->student_id)->where('status','!=',3)->get();
            if($cekdis->count()==1){
                return redirect()->route('disertasi')->with('delete', 'Mahasiswa Ini Sudah Memiliki Disertasi');

            }else{
                try {
                    $disertasi = Disertasi::create([
                        'title' => $request->title,
                        'student_id' => $request->student_id,
                        'topic_id' => $request->topic_id,
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
                    return redirect()->route('disertasi')->with('info', 'Disertasi Berhasil Ditambahkan');

                } catch (QueryException $e){
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        return redirect()->route('disertasi')->with('delete', 'Ada Kesalahan Input, Coba beberapa saat lagi');
                    }
                }
            }

        }elseif($user->type==3){

            $this->validate($request,
                [
                    'topic_id' => 'required'
                ]
            );

            try {
                // dd($this->disertasiId);
                $disertasi = Disertasi::create([
                    'title' => $request->title,
                    'student_id' => $user->id,
                    'topic_id' => $request->topic_id,
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
                return redirect()->route('disertasi')->with('info', 'Disertasi Berhasil Ditambahkan');

            } catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    return redirect()->route('disertasi')->with('delete', 'Mohon maaf ada kesalahan input, coba beberapa saat lagi');
                }
            }
        }

        return redirect()->route('disertasi')->with('delete', 'Mohon maaf ada kesalahan input, coba beberapa saat lagi');
    }
}
