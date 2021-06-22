<?php

namespace App\Http\Livewire;

use App\Models\Disertasi;
use App\Models\DisertasiLecturer;
use App\Models\Lecturer;
use App\Models\ProsesDisertasi;
use Livewire\Component;

class Ddisertasi extends Component
{
    public $isOpen;
    public $disertasiId;

    public function mount($id){
        $this->disertasiId = $id;
    }

    public function render()
    {
        $proses_disertasis = ProsesDisertasi::all();
        $lecturers = DisertasiLecturer::where('disertasi_id',$this->disertasiId);
        $disertasi = Disertasi::find($this->disertasiId);
        $name = Lecturer::pluck('name','id');
        return view('livewire.disertasi.detail',[
            'proses_disertasis' => $proses_disertasis,
            'lecturers' => $lecturers,
            'disertasi' => $disertasi,
            'name' => $name
        ]);
    }
}
