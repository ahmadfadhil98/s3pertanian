<?php

namespace App\Http\Livewire;

use App\Models\File as ModelsFile;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class File extends Component
{
    use WithFileUploads;

    public $isOpen,$isDel,$delId,$search,$file,$fileId,$name;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $files = ModelsFile::where('name','like',$searchParam)->paginate(6);
        return view('livewire.file.index',[
            'files' => $files
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
                'file' => 'required'
            ]
        );

        try {
            $file = $this->file->store('files');
            $filename = $this->file->getClientOriginalName();

            ModelsFile::updateOrCreate(['id' => $this->fileId], [
                'name' => $this->name,
                'file' => $filename,
                'path' => $file
            ]);

            session()->flash('info', $this->fileId ? 'file Update Successfully' : 'file Created Successfully' );

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Duplicate Entry');
            }
        }

        $this->hideModal();

        $this->fileId = '';
        $this->name = '';
        $this->file = '';
    }

    public function download($id) {
        $file = ModelsFile::find($id);
        return Storage::download($file->path,$file->file);
    }

    public function delete($id){
        try{
            $file = ModelsFile::find($id);
            Storage::delete($file->path);
            $file->delete();
            session()->flash('delete','Dosen Successfully Deleted');
            $this->hideDel();
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak bisa menghapus,coba beberapa saat lagi');
        }

    }
}
