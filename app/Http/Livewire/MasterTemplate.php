<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MasterTemplate extends Component
{
    public function render()
    {
        return view('livewire.master-template')
        ->extends('dashboard.layout')
        ->section('content');
    }

    public function mount(){
        // dd(getActiveNavbar('/template'));
    }
}
