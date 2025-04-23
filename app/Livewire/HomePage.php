<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page',[
            'user' => Auth::user()
        ]);
    }
}
