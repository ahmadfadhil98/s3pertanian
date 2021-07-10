<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use App\Models\Staff as ModelsStaff;
use App\Models\User;
use Illuminate\Database\QueryException;
use Livewire\Component;

class Staff extends Component
{
    use WithPagination;
    public $isOpen,$isDel,$delId,$search;
    public $staffId,$nip,$name,$email;

    public function render()
    {
        $searchParam = '%'.$this->search.'%';
        $staffs = ModelsStaff::where('name','like',$searchParam)->orWhere('nip','like',$searchParam)->paginate(6);
        return view('livewire.staff.index',[
            'staffs' => $staffs
        ]);
    }

    public function showModal() {
        $this->isOpen = true;
    }

    public function hideModal() {
        $this->staffId = '';
        $this->name = '';
        $this->nip = '';
        $this->email = '';
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
                'nip' => 'required',
                'email' => 'required',
            ]
        );

        try {
            // dd($this->staffId);
            $user = User::updateOrCreate(['id' => $this->staffId], [
                'name' => $this->name,
                'username' => $this->nip,
                'email' => $this->email,
                'password' => bcrypt($this->nip),
                'type' => 4,
                'remember_token' => null,
            ]);
            $user->roles()->sync(4);

            if($this->staffId){
                $user->staff()->update([
                    'name' => $this->name,
                    'nip' => $this->nip,
                ]);
            }else{
                $user->staff()->create([
                    'name' => $this->name,
                    'nip' => $this->nip,
                ]);
            }

            session()->flash('info', $this->staffId ? 'Berhasil Diedit' : 'Berhasil Ditambahkan' );
            $this->emit('saved');

        } catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                session()->flash('delete', 'Kesalahan Input');
                $this->emit('saved');
            }
        }

        $this->hideModal();

        $this->staffId = '';
        $this->name = '';
        $this->nip = '';
        $this->email = '';
    }

    public function edit($id){
        $user = User::findOrFail($id);
        $lecturer = ModelsStaff::findOrFail($id);
        $this->staffId = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->nip = $lecturer->nip;
        $this->showModal();
    }

    public function delete($id){
        try{
            ModelsStaff::find($id)->delete();
            User::find($id)->delete();
            session()->flash('delete','Berhasil Dihapus');
            $this->emit('saved');
        }catch(QueryException $e){
            session()->flash('delete', 'Tidak Bisa Menghapus, Coba Beberapa Saat Lagi');
            $this->emit('saved');
        }

    }
}
