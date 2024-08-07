<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index(){
        return view('cars.car-register');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'registration_number' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'required|string',
            'transmission' => 'required|string',
        ]);

        // Create a new car instance and save to the database
        Car::create($validatedData);

        return redirect()->route('car.manage')->with('success', 'Car registered successfully!');
    }

    public function manage(){
        echo "Car manage";
    }
}
