<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.frontend.login')->layout('layouts.frontend.app');
    }
}
