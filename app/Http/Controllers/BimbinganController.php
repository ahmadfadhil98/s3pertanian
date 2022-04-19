<?php

namespace App\Http\Controllers;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BimbinganController extends Controller
{
    public function create($id){
        $disertasiId = $id;
        $lecturers = DisertasiLecturer::where('disertasi_id', $id)->paginate(4);
        $disertasi = Disertasi::find($id);
        $name = Lecturer::pluck('name', 'id');
        $student = Student::pluck('name', 'id');
        $nim = Student::pluck('nim', 'id');
        $faculty = Lecturer::pluck('faculty', 'id');
        $faculties = config('central.faculties');
        $positions = config('central.position');
        $nip = Lecturer::pluck('nip', 'id');

        return view('livewire.bimbingan.create', [
            'disertasiId' => $disertasiId,
            'lecturers' => $lecturers,
            'faculty' => $faculty,
            'faculties' => $faculties,
            'disertasi' => $disertasi,
            'student' => $student,
            'nim' => $nim,
            'name' => $name,
            'nip' => $nip,
            'positions' => $positions
        ]);
    }

    public function store($id, Request $request){
        $this->validate($request,[
            'lecturer_id' => 'required',
            'position' => 'required',
        ]);

        // dd($request);

        try {
            // dd($this->lecturerId);
            DisertasiLecturer::updateOrCreate(['id' => $request->lecturerId], [
                'disertasi_id' => $id,
                'lecturer_id' => $request->lecturer_id,
                'position' => $request->position,
                'approve' => 1,
            ]);

            return redirect()->route('bimbingan', $id)->with('info', 'Data berhasil ditambahkan');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                return redirect()->route('bimbingan', $id)->with('info', 'Posisi Pembimbing sudah ada');
            }
        }
    }
}
