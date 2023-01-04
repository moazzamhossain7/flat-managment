<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Lot;
use App\Models\LotPicture;
use App\Models\User;
use App\Models\Location;
use App\Models\LotTenant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Dashboard extends Component
{
    use WithFileUploads;

    public $user;
    // public $flats;
    public $locations;
    public $tenantFlats;

    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $profession;
    public $address;
    public $about;
    public $password;
    public $password_confirmation;

    public Lot $form;
    public $photos = [];
    public $amenities = [];

    public $currentTab = 'dashboard';

    protected $listeners = [
        'refreshFlats' => '$refresh',
        'triggerDelete' => 'destroy',
    ];

    protected $messages = [
        'required' => 'This field is required!',
    ];

    protected $rules = [
        'form.location_id' => 'required|exists:locations,id',
        'form.name' => 'required',
        'form.description' => 'required',
        'form.price' => 'required',
        'form.property_id' => 'required',
        'form.type' => 'required',
        'form.rent_type' => 'required',
        'form.address' => 'required',
        'form.lat' => 'required',
        'form.lang' => 'required',
        'form.lot_area' => 'required',
        'form.home_area' => 'required',
        'form.rooms' => 'required',
        'form.beds' => 'required',
        'form.baths' => 'required',
        'form.built' => 'required',
        'photos.*' => 'image|max:2048',
    ];

    public function mount() {
        $this->user = auth()->user();
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->profession = $this->user->profession;
        $this->address = $this->user->address;
        $this->about = $this->user->about;

        $this->form = $this->makeBlankForm();
        $this->locations = Location::optionLists();

        if ($this->user->role == 'tenant') {
            $this->tenantFlats = LotTenant::with('lot.lotPictures', 'lot.location')->where('tenant_id', $this->user->id)->latest()->get();
        } else {
            // $this->flats = Lot::with('lotPictures', 'location')->where('owner_id', $this->user->id)->latest()->get();
        }
    }

    public function changeTab($newTab) {
        $this->currentTab = $newTab;
    }

    public function updatePassword() {
        $this->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            $password = bcrypt($this->password);
            User::where('id', auth()->user()->id)->update(['password' => $password]);
            $this->reset(['password', 'password_confirmation']);

            $this->notify('Your password updated successfully.');

            Auth::guard('web')->logout();
            return redirect()->to('/login');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    public function updateProfile() {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email,' . $this->user->id . '',
            'phone' => 'required',
        ]);

        try {
            $payload = [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'phone' => $this->phone,
                'profession' => $this->profession,
                'address' => $this->address,
                'about' => $this->about,
            ];

            User::where('id', $this->user->id)->update($payload);

            $this->notify('Your account details updated successfully.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    /**
     * Build blank form
     */
    public function makeBlankForm()
    {
        return Lot::make(['status' => 'for rent']);
    }

    public function addProperty() {
        $this->validate();

        try {
            $this->form->owner_id = $this->user->id;
            $this->form->amenities = $this->amenities;
            $this->form->save();
            $this->storeLotPictures($this->form);

            $this->form = $this->makeBlankForm();
            $this->reset('photos');
            $this->changeTab('properties');
            
            $this->notify('Your flat added successfully.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    public function storeLotPictures($lot) {
        $filepath = 'assets/frontend/img/lots/';
        
        foreach ($this->photos as $photo) {
            $filename = time() . "-" . rand(1000, 9999) . ".png";
            $photo->storePubliclyAs($filepath, $filename, 'local');

            LotPicture::create([
                'lot_id' => $lot->id,
                'path' => $filepath . $filename,
            ]);
        }
    }

    /**
     * handle delete resource
     *
     * @param mix $id
     * @return void
     */
    public function destroy($id)
    {
        try {
            Lot::findOrFail($id)->delete();

            $this->notify('Flat deleted successfully.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    public function render()
    {
        return view('livewire.frontend.dashboard', [
            'flats' => Lot::with('lotPictures', 'location')->where('owner_id', $this->user->id)->latest()->get()
        ])->layout('layouts.frontend.app');
    }
}
