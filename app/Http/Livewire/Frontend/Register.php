<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    public User $form;
    public $password;
    public $password_confirmation;

    /**
     * constructor
     */
    public function mount()
    {
        $this->form = $this->makeBlankForm();
    }

    /**
     * Set of validation rules
     */
    public function rules()
    {
        return [
            'form.first_name' => 'required',
            'form.last_name' => 'required',
            'form.email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ];
    }

    /**
     * Build blank form
     */
    public function makeBlankForm()
    {
        return User::make(['status' => true]);
    }

    /**
     * Store form into DB
     */
    public function save()
    {
        $this->validate();

        try {
            if ($this->password) {
                $this->form->password = bcrypt($this->password);
            }
            $this->form->save();

            $credentials = ['email' => $this->form->email, 'password' => $this->password];
            $this->resetForm();

            if (Auth::attempt($credentials)) {
                return redirect()->to('/dashboard');
            }

            $this->notify('User registration successfull.');
        } catch (\Exception $e) {
            $this->notify($e->getMessage(), 'danger');
        }
    }

    /**
     * Clsoe modal and reset form
     */
    public function resetForm()
    {
        $this->form = $this->makeBlankForm();
    }

    public function render()
    {
        return view('livewire.frontend.register')->layout('layouts.frontend.app');
    }
}
