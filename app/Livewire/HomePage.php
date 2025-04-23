<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Phone;

class HomePage extends Component
{
    public function render()
    {
        return view('livewire.home-page',[
            'user' => Auth::user(),
            'phones' => Phone::latest()->take(10)->get(),
        ]);
    }
}
