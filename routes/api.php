<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Auth::routes();

// Register a new user route
Route::post('/signup', [RegisterController::class, 'register']);

// login a new user route
Route::post('/signin', [LoginController::class, 'login']);


// Apartment routes
Route::apiResource('apartments', ApartmentController::class);

// Get all apartments
Route::resource('apartments', ApartmentController::class)->only([
    'index'
]);


    //Delete an apartment
    Route::middleware(['auth', 'check.manager'])->group(function () {
        Route::middleware(['check.id'])->group(function () {
            Route::delete('apartments/{id}', 'ApartmentController@destroy');
        });
    });
    


// Get all apartments rented or not
Route::get('/apartments_rented', [ApartmentController::class, 'rented']);
