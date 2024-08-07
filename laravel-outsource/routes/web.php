<?php

use App\Http\Controllers\AddServiceController;
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

Route::post('/cars-save', [CarController::class, 'store'])->name('cars.store');

// Route::get('/get-cars', [CarController::class, 'getCars'])->name('cars.get');

Route::get('/car-manage', [CarController::class, 'manage'])->name('car.manage');

Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('/add-service', [AddServiceController::class, 'index'])->name('services.index');
Route::get('/serch-in-service', [AddServiceController::class, 'search'])->name('services.search');
