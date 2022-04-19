<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Bimbingan extends Component
{
    public $isOpen, $isDel, $delId;
    public $lecturerId, $lecturer_id, $position;
    public $disertasiId;
	public $nama, $nidn, $fakultas,$keterangan;

    public function mount($id)
    {
        $this->disertasiId = $id;
    }

    public function render()
    {
        $lecturers = DisertasiLecturer::where('disertasi_id', $this->disertasiId)->paginate(4);
        $disertasi = Disertasi::find($this->disertasiId);
        $name = Lecturer::pluck('name', 'id');
        $student = Student::pluck('name', 'id');
        $nim = Student::pluck('nim', 'id');
        $faculty = Lecturer::pluck('faculty', 'id');
        $faculties = config('central.faculties');
        $positions = config('central.position');
        $nip = Lecturer::pluck('nip', 'id');
        $keterangans = Lecturer::pluck('keterangan', 'id');

        return view('livewire.bimbingan.index', [
            'lecturers' => $lecturers,
            'faculty' => $faculty,
            'faculties' => $faculties,
        	'keterangans' => $keterangans,
            'disertasi' => $disertasi,
            'student' => $student,
            'nim' => $nim,
            'name' => $name,
            'nip' => $nip,
            'positions' => $positions
        ]);
    }

    public function showModal()
    {
        $this->isOpen = true;
    }

    public function hideModal()
    {
        $this->lecturerId = '';
        $this->lecturer_id = '';
        $this->position = '';
    	$this->nidn = '';
        $this->nama = '';
        $this->fakultas = '';
        $this->isOpen = false;
    }

    public function showDel($id)
    {
        $this->delId = $id;
        $this->isDel = true;
    }

    public function hideDel()
    {
        $this->isDel = false;
    }

    public function store()
    {

        $this->validate(
            [
                'nama' => 'required',
                'nidn' => 'required|unique:lecturers,nip',
                'fakultas' => 'required',
                'position' => 'required',
            ]
        );
    
    	if($this->keterangan==16){
            $this->validate(
                [
                    'keterangan' => 'required'
                ]
            );
        }

        $bimbingan = DisertasiLecturer::select('position')->where('disertasi_id',$this->disertasiId)->where('position', $this->position)->get();
        if(!$bimbingan->isEmpty()){
            $this->emit('saved');
            session()->flash('delete', 'Posisi Sudah ada');
            $this->hideModal();
        }

        try {
            // dd($this->lecturerId);
            $nipi = $this->nidn;
            $user = User::create([
                'id' => $nipi,
                'name' => $this->nama,
                'username' => $nipi,
                'email' => $nipi.'@mail.com',
                'password' => bcrypt($nipi),
                'type' => 2,
                'remember_token' => null,
            ]);
            $user->roles()->sync(2);

            $user->lecturer()->create([
                'name' => $this->nama,
                'nip' => $nipi,
                'faculty' => $this->fakultas,
            	'keterangan'=> $this->keterangan
            ]);

            DisertasiLecturer::updateOrCreate(['id' => $this->lecturerId], [
                'disertasi_id' => $this->disertasiId,
                'lecturer_id' => $user->id,
                'position' => $this->position,
                'approve' => 1,
            ]);

            $this->emit('saved');
            session()->flash('info', $this->lecturerId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                $this->emit('saved');
                session()->flash('delete', 'Kesalahan Input');
            }
        }

        $this->hideModal();
    }

    public function edit($id)
    {
        $lecturer = DisertasiLecturer::findOrFail($id);
        $this->lecturerId = $id;
        $this->lecturer_id = $lecturer->lecturer_id;
        $this->position = $lecturer->position;
        $this->showModal();
    }

    public function delete($id)
    {
        try {
            DisertasiLecturer::find($id)->delete();
            $this->emit('saved');
            session()->flash('delete', 'Berhasil Dihapus');
            $this->hideDel();
        } catch (QueryException $e) {
            $this->emit('saved');
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }
    }

    public function back()
    {
        return redirect()->to('/ddisertasi/' . $this->disertasiId);
    }
}
