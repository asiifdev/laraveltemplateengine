<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MasterMenu extends Component
{
    public function render()
    {
        return view('livewire.master-menu')
        ->extends('dashboard.layout')
        ->section('content');
    }

    public function mount(){
        // dd(getCurrentMenu());
    }
}
