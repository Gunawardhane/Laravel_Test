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

        Car::create($validatedData);

        return redirect()->route('car.manage')->with('success', 'Car registered successfully!');
    }

    // public function manage(){
    //     return view('cars.car-manage');
    // }

    public function manage(Request $request) {
        $cars = Car::all();


            $registration_number = $request->input('registration_number');
            $model = $request->input('model');
            $customer_name = $request->input('customer_name');

            $cars = Car::query()
                ->when($registration_number, function ($query, $registration_number) {
                    return $query->where('registration_number', 'LIKE', "%{$registration_number}%");
                })
                ->when($model, function ($query, $model) {
                    return $query->where('model', 'LIKE', "%{$model}%");
                })
                ->when($customer_name, function ($query, $customer_name) {
                    return $query->where('customer_name', 'LIKE', "%{$customer_name}%");
                })
                ->paginate(10);

        return view('cars.car-manage', compact('cars'));
    }

    public function edit(Car $car)
    {
        return view('cars.car-edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validatedData = $request->validate([
            'registration_number' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuel_type' => 'required|string',
            'transmission' => 'required|string',
        ]);

        $car->update($validatedData);

        return redirect()->route('car.manage')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('car.manage')->with('success', 'Car deleted successfully!');
    }
}
