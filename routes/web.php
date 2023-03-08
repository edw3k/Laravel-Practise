<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApartmentController;

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

Route::get('/', function () {
    return view('welcome');
});


//Apartment route
Route::middleware('auth')->group(function () {
    Route::resource('apartments', ApartmentController::class);
});


Route::middleware(['auth', 'check.manager'])->group(function () {
    Route::middleware(['check.id'])->group(function () {
        Route::resource('apartments', 'ApartmentController');
    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['check.id'])->group(function () {
    Route::resource('apartments', ApartmentController::class);
});
