<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Diagram extends Component
{

    public function render()
    {

        if(Auth::user()){
            return view('dashboard');
        }else{
            return view('livewire.diagram');
        }
    }

}
