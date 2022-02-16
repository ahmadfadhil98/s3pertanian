<?php

namespace App\Http\Livewire;

use App\Imports\ProsesImport;
use App\Models\Kurikulum;
use Livewire\WithPagination;
use App\Models\ProsesDisertasi as ModelsProsesDisertasi;
use Illuminate\Database\QueryException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ProsesDisertasi extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $isOpen,$isDel,$delId,$search;
    public $pdId,$name,$file_lots,$link_lots,$terms_id,$kode;
    public $isImport,$file,$kurikulum_id;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $proses_disertasis = ModelsProsesDisertasi::where('name','like',$searchParam)->paginate(6);
        $pd = ModelsProsesDisertasi::pluck('name','id');
        $kurikulums = Kurikulum::pluck('name','id');
        return view('livewire.proses_disertasi.index',[
            'proses_disertasis' => $proses_disertasis,
            'pd' => $pd,
            'kurikulums' => $kurikulums
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->kode = null;
        $this->pdId = '';
        $this->name = '';
        $this->file_lots = '';
        $this->link_lots = '';
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

    public function showImport() {
        $this->isImport = true;
    }

    public function hideImport() {
        $this->file = '';
        $this->isImport = false;
    }

    public function store(){

        $this->validate(
            [
                'kode' => 'required',
                'name' => 'required',
                'kurikulum_id' => 'required',
            ]
        );

        try {
            // dd($this->pdId);
            ModelsProsesDisertasi::updateOrCreate(['id' => $this->pdId], [
                'kode' => $this->kode,
                'name' => $this->name,
                'kurikulum_id' => $this->kurikulum_id,
                'file_lots' => $this->file_lots,
                'link_lots' => $this->link_lots,
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
    }

    public function import(){
        $this->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ProsesImport, $this->file);

        $this->hideImport();
    }

    public function edit($id){
        $proses_disertasi = ModelsProsesDisertasi::findOrFail($id);
        $this->pdId = $id;
        $this->kode = $proses_disertasi->kode;
        $this->name = $proses_disertasi->name;
        $this->kurikulum_id = $proses_disertasi->kurikulum_id;
        $this->file_lots = $proses_disertasi->file_lots;
        $this->link_lots = $proses_disertasi->link_lots;
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
