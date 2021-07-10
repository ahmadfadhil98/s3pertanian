<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\ProsesDisertasi as ModelsProsesDisertasi;
use Illuminate\Database\QueryException;
use Livewire\Component;

class ProsesDisertasi extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $pdId,$name,$upload_lots,$terms_id;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $proses_disertasis = ModelsProsesDisertasi::where('name','like',$searchParam)->paginate(6);
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
        $this->pdId = '';
        $this->name = '';
        $this->upload_lots = '';
        $this->terms_id = '';
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
            ]
        );

        try {
            // dd($this->pdId);
            ModelsProsesDisertasi::updateOrCreate(['id' => $this->pdId], [
                'name' => $this->name,
                'upload_lots' => $this->upload_lots,
                'terms_id' => $this->terms_id
            ]);
            $this->emit('saved');
            session()->flash('info', $this->pdId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $this->emit('saved');
                session()->flash('delete', 'Kesalahan Input');
            }
        }

        $this->hideModal();

        $this->pdId = '';
        $this->name = '';
        $this->upload_lots = '';
        $this->link_lots = '';
        $this->terms_id = '';
    }

    public function edit($id){
        $proses_disertasi = ModelsProsesDisertasi::findOrFail($id);
        $this->pdId = $id;
        $this->name = $proses_disertasi->name;
        $this->upload_lots = $proses_disertasi->upload_lots;
        $this->terms_id = $proses_disertasi->terms_id;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsProsesDisertasi::find($id)->delete();
            session()->flash('delete','Berhasil Dihapus');
            $this->emit('saved');
            $this->hideDel();
        }catch(QueryException $e){
            $this->emit('saved');
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }

    }
}
