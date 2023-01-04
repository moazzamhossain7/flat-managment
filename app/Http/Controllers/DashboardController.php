<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function paymentCallback($status) {
        if ($status == 'success') {
            session()->flash('success', 'Your flat rent processing successfull.');
        } else {
            session()->flash('error', 'Failed to process your flat rent!');
        }
        
        return redirect()->to("/dashboard");
    }
}
