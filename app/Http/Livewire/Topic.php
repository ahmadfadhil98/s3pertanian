<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\DisertasiTopic;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Topic extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $name,$topicId;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $topics = DisertasiTopic::where('name','like',$searchParam)->paginate(6);
        return view('livewire.topic.index',[
            'topics' => $topics
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->topicId = '';
        $this->name = '';
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
            ]
        );

        try {
            // dd($this->topicId);
            $topic = DisertasiTopic::updateOrCreate(['id' => $this->topicId], [
                'name' => $this->name,
            ]);


            session()->flash('info', $this->topicId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
            }
        }

        $this->hideModal();

        $this->topicId = '';
        $this->name = '';
    }

    public function edit($id){
        $topic = DisertasiTopic::findOrFail($id);
        $this->topicId = $id;
        $this->name = $topic->name;
        $this->showModal();
    }

    public function delete($id){
        try{
            DisertasiTopic::find($id)->delete();
            session()->flash('delete','Berhasil Dihapus');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
        }

    }
}
