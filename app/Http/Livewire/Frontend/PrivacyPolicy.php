<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class PrivacyPolicy extends Component
{
    public function render()
    {
        return view('livewire.frontend.privacy-policy')->layout('layouts.frontend.app');
    }
}
