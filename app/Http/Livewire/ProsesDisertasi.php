<?php

namespace App\Http\Livewire;

use App\Models\ProsesDisertasi as ModelsProsesDisertasi;
use Illuminate\Database\QueryException;
use Livewire\Component;

class ProsesDisertasi extends Component
{
    public $isOpen,$isDel,$delId,$search;
    public $pdId,$name,$upload_lots,$link_lots,$terms_id;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $proses_disertasis = ModelsProsesDisertasi::where('name','like',$searchParam)->paginate(7);
        $pd = ModelsProsesDisertasi::pluck('name','id');
        return view('livewire.proses_disertasi.index',[
            'proses_disertasis' => $proses_disertasis,
            'pd' => $pd
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
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

        $this->validate(
            [
                'name' => 'required',
                'upload_lots' => 'required',
                'link_lots' => 'required',
            ]
        );

        try {
            // dd($this->pdId);
            ModelsProsesDisertasi::updateOrCreate(['id' => $this->pdId], [
                'name' => $this->name,
                'upload_lots' => $this->upload_lots,
                'link_lots' => $this->link_lots,
            ]);

            session()->flash('info', $this->pdId ? 'Proses Disertasi Update Successfully' : 'Proses Disertasi Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->pdId = '';
        $this->name = '';
        $this->upload_lots = '';
        $this->link_lots = '';
    }

    public function edit($id){
        $proses_disertasi = ModelsProsesDisertasi::findOrFail($id);
        $this->pdId = $id;
        $this->name = $proses_disertasi->name;
        $this->upload_lots = $proses_disertasi->upload_lots;
        $this->link_lots = $proses_disertasi->link_lots;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsProsesDisertasi::find($id)->delete();
            session()->flash('delete','Proses Disertasi Successfully Deleted');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }

    }
}
