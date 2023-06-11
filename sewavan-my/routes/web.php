<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [WelcomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/create-booking', [BookingController::class, 'create'])->name('create-booking');
Route::get('/create-booking/{id}', [BookingController::class, 'show'])->name('show-booking');
Route::get('/create-booking/{id}/confirm', [BookingController::class, 'confirm'])->name('confirm-booking');
Route::get('/create-booking/{id}/checkout', [BookingController::class, 'showCheckout'])->name('checkout-booking');
Route::post('/create-booking/checkout/submit', [BookingController::class, 'store'])->name('store-booking');