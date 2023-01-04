<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\Lot;
use App\Models\LotTenant;
use App\Models\TenantPayment;
use Illuminate\Support\Str;

class Checkout extends Component
{
    public $flat;
    public $token;
    public $order;

    public function mount($flatId) {
        $this->token = Str::random(10);
        $this->order = Str::random(10);
        $this->flat = Lot::with('lotPictures', 'location')->findOrFail($flatId);
    }

    public function cashPayment() {
        try {
            $user = auth()->user();

            LotTenant::create([
                'lot_id' => $this->flat->id,
                'tenant_id' => $user->id,
                'start_date' => date('Y-m-d'),
                'agreed_rent' => $this->flat->price,
            ]);
    
            TenantPayment::create([
                'lot_id' => $this->flat->id,
                'tenant_id' => $user->id,
                'payment_date' => date('Y-m-d'),
                'rent_month' => date('F'),
                'trans_id' => uniqid(),
                'amount' => $this->flat->price,
                'payment_method' => 'cash',
            ]);

            Lot::where('id', $this->flat->id)->update(['status' => 'rented']);

            return redirect()->to('/payment-callback/success');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    public function render()
    {
        return view('livewire.frontend.checkout')->layout('layouts.frontend.app');
    }
}
