<?php

namespace App\Http\Livewire;

use App\Models\Academic;
use Livewire\Component;

class DetailAcademic extends Component
{
    public $academicId,$isDel,$delId;

    public function mount($id){
        $this->academicId = $id;
    }

    public function showDel() {
        $this->delId = $this->academicId;
        $this->isDel = true;
    }

    public function hideDel() {
        $this->isDel = false;
    }

    public function render()
    {
        // dd($this->academicId);
        $academic = Academic::find($this->academicId);

        return view('livewire.detail_academic.index',[
            'academic' => $academic
        ]);
    }
}
