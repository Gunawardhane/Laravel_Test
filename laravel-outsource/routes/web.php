<?php

use App\Http\Controllers\AddServiceController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InitiateServiceController;
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
Route::get('/car-manage', [CarController::class, 'manage'])->name('car.manage');
Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

Route::get('/add-service', [AddServiceController::class, 'index'])->name('services.index');
Route::get('/sesrch-in-service', [AddServiceController::class, 'search'])->name('services.search');
Route::get('/search', [AddServiceController::class, 'search'])->name('search.customers');

Route::get('/initiate-service/{carId}', [InitiateServiceController::class, 'create'])->name('initiate.service');
Route::post('initiate-service/{car}', 'InitiateServiceController@store')->name('initiate.service');



