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

    public $isOpen,$search,$file,$fileId,$name;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $files = ModelsFile::where('name','like',$searchParam)->paginate(7);
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
}
