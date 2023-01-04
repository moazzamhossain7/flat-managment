<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Lot;
use App\Models\User;
use App\Models\Location;

class Home extends Component
{
    public $locations;
    public $featureFlats;
    public $locationOptions;
    public $counter = [];

    public $propertyArea;
    public $propertyType;
    public $propertyStatus;

    public function mount() {
        $this->locations = Location::withCount('lots')->get();
        $this->featureFlats = Lot::with('lotPictures')->inRandomOrder()->limit(10)->get();
        $this->locationOptions = Location::optionLists();

        $area = Lot::all()->sum('lot_area');
        $this->counter['area'] = $area > 0 ? ceil($area / 1000) : 0;
        $this->counter['apartment'] = Lot::count();
        $this->counter['landlord'] = User::where('role', 'landlord')->count();
        $this->counter['tenant'] = User::where('role', 'tenant')->count();
    }

    public function doit() {
        dd('ok');
    }

    public function handleFindClick() {
        // if (!empty($this->propertyArea) || !empty($this->propertyType) || !empty($this->propertyStatus)) {
        //     $searchStr = "?location={$this->propertyArea}&type={$this->propertyType}&status={$this->propertyStatus}";
        //     dd($searchStr);

        // }
        // dd($this->propertyArea);
        // $searchStr = "?location={$this->propertyArea}&type={$this->propertyType}&status={$this->propertyStatus}";
        // return redirect()->to("/flats{$searchStr}");
    }

    public function render()
    {
        return view('livewire.frontend.home')
            ->layout('layouts.frontend.app');
    }
}
