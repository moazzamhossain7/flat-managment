<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Lot;

class FlatDetails extends Component
{
    public $flat;
    public $relatedProperties;

    public function mount($flatId) {
        $this->flat = Lot::with('lotPictures', 'location', 'owner', 'comments')->findOrFail($flatId);
        $this->relatedProperties = Lot::with('lotPictures', 'location')->where('location_id', $this->flat->location_id)->limit(6)->get();
    }

    public function bookApartment() {
        if (auth()->check()) {
            return redirect()->to("/checkout/{$this->flat->id}");
        } else {
            session(['intended_url' => "/checkout/{$this->flat->id}"]);
            return redirect()->to('/login');
        }
    }

    public function render()
    {
        return view('livewire.frontend.flat-details')->layout('layouts.frontend.app');
    }
}
