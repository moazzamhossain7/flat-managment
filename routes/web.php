<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Home;
use App\Http\Livewire\Frontend\Flat;
use App\Http\Livewire\Frontend\FlatDetails;
use App\Http\Livewire\Frontend\About;
use App\Http\Livewire\Frontend\Contact;
use App\Http\Livewire\Frontend\PrivacyPolicy;
use App\Http\Livewire\Frontend\TermsCondition;
use App\Http\Livewire\Frontend\Register;
use App\Http\Livewire\Frontend\Login;
use App\Http\Livewire\Frontend\Dashboard;
use App\Http\Livewire\Frontend\Checkout;
use App\Http\Livewire\Frontend\Payment;

use App\Http\Controllers\SslCommerz\SslCommerzPaymentController;
use App\Http\Controllers\DashboardController;

Route::get('/', Home::class);
Route::get('/flats', Flat::class);
Route::get('/flat/{flatId}', FlatDetails::class);

Route::get('/about', About::class);
Route::get('/contact', Contact::class);
Route::get('/privacy-policy', PrivacyPolicy::class);
Route::get('/terms-condition', TermsCondition::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/checkout/{flatId}', Checkout::class);
    Route::get('/payment-callback/{status}', [DashboardController::class, 'paymentCallback']);
});

Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);

Route::post('/order/make', [SslCommerzPaymentController::class, 'makeOrder']);
Route::post('/order/complete', [SslCommerzPaymentController::class, 'orderComplete']);

require __DIR__ . '/auth.php';