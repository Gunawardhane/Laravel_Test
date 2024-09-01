<?php

use App\Http\Controllers\AddServiceController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InitiateServiceController;
use App\Http\Controllers\RegisterCars;
use App\Http\Controllers\ServiceController;
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

// Route::resource('customers', CustomerController::class);
Route::get('register/customer', [CustomerController::class, 'create'])->name('customer.register');
Route::post('store/customer', [CustomerController::class, 'store'])->name('customer.store');
Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');

// Cars
// Route::resource('cars', CarController::class);
// Route::get('/cars', 'CarController@index')->name('cars.index');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');

// Route::get('/cars/create', 'CarController@create')->name('cars.create');
Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
// Route::post('/cars', 'CarController@store')->name('cars.store');
Route::post('/cars',[CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{id}', 'CarController@show')->name('cars.show');
Route::get('/cars/{id}/edit', 'CarController@edit')->name('cars.edit');
Route::patch('/cars/{id}', 'CarController@update')->name('cars.update');
Route::delete('/cars/{id}', 'CarController@destroy')->name('cars.destroy');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
// Route::get('/cars/{car}/services', [ServiceController::class, 'initiateService'])->name('services.initiate');
// Route::get('/cars/{carId}/initiate-service', [CustomerController::class, 'initiateService'])->name('initiate-service');

Route::post('/cars/{car}/services', [ServiceController::class, 'store'])->name('services.store');






Route::get('/AddService', [ServiceController::class, 'servicePage'])->name('servicePage');


// Route::get('cars/initiate-service/{car}', 'ServiceController@initiateService')->name('initiate-service');
Route::get('cars/initiate-service/{car}', [ServiceController::class, 'initiateService'])->name('initiate-service');
// Route::post('cars/add-service/{car}', 'ServiceController@addService')->name('add-service');
Route::post('cars/add-service/{car}', [ServiceController::class, 'addService'])->name('add-service');

















// routes/web.php

// Route::get('search-customer', [CustomerController::class, 'searchCustomer'])->name('search-customer');
// Route::get('/initiate-service/{carId}', [CustomerController::class, 'initiateService'])->name('initiate-service');
// Route::post('confirm-service', [CustomerController::class, 'confirmService'])->name('confirm-service');


// Route::get('admin/initiate-service/{carId}', 'CustomerController@initiateService')->name('admin.initiate-service');


Route::get('/car-register', [CarController::class, 'index'])->name('car.register');
// Route::get('/car-register', [CarController::class, 'index'])->name('car.register');
// Route::post('/cars-save', [CarController::class, 'store'])->name('cars.store');
Route::get('/car-manage', [CarController::class, 'manage'])->name('car.manage');
Route::get('/cars/{car}/edit', [CarController::class, 'edit'])->name('cars.edit');
// Route::put('/cars/{car}', [CarController::class, 'update'])->name('cars.update');
// Route::delete('/cars/{car}', [CarController::class, 'destroy'])->name('cars.destroy');

// Route::get('/add-service', [AddServiceController::class, 'index'])->name('services.index');
// Route::get('/sesrch-in-service', [AddServiceController::class, 'search'])->name('services.search');
// Route::get('/search', [AddServiceController::class, 'search'])->name('search.customers');

// Route::get('/initiate-service/{carId}', [InitiateServiceController::class, 'create'])->name('initiate.service');
// Route::post('initiate-service/{car}', 'InitiateServiceController@store')->name('initiate.service');



