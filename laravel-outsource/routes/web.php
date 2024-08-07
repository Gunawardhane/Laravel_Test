<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\RegisterCars;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/car-register', [CarController::class, 'index'])->name('car.register');

Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

Route::get('/car-manage', [CarController::class, 'manage'])->name('car.manage');
