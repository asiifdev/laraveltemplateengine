<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard')
        ->extends('dashboard.layout')
        ->section('content');
    }

    public function mount(){
        // dd(getActiveNavbar('/'));
    }
}
