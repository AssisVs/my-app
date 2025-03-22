<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Http\Controllers\WebhookController;

Route::post('webhook', [WebhookController::class, 'handle']);
Route::webhooks('paystack/webhook');

Route::get('/counter', Counter::class);

Route::get('/', function () {
    ds('route / e chama welcome');
    return view('welcome');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
