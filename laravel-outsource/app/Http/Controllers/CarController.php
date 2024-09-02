<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Customer;

class CarController extends Controller
{
    /**
     * Display a listing of the cars.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $query = Car::query();

            if ($request->filled('registration_number')) {
                $query->where('registration_number', 'like', '%' . $request->registration_number . '%');
            }

            if ($request->filled('model')) {
                $query->where('model', 'like', '%' . $request->model . '%');
            }

            if ($request->filled('customer_id')) {
                $query->where('customer_id', $request->customer_id);
            }

            $cars = $query->get();
            $customers = Customer::all();

            return view('cars.index', compact('cars', 'customers'));
        }


    /**
     * Show the form for creating a new car.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();

        return view('cars.create', compact('customers'));
    }

    /**
     * Store a newly created car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'registration_number' => 'required|unique:cars',
            'model' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $car = new Car();
        $car->registration_number = $request->input('registration_number');
        $car->model = $request->input('model');
        $car->fuel_type = $request->input('fuel_type');
        $car->transmission = $request->input('transmission');
        $car->customer_id = $request->input('customer_id');
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car created successfully!');
    }

    /**
     * Display the specified car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::with('customer')->find($id);

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::with('customer')->find($id);
        $customers = Customer::all();

        return view('cars.edit', compact('car', 'customers'));
    }

    /**
     * Update the specified car in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'registration_number' => 'required|unique:cars,registration_number,' . $id,
            'model' => 'required',
            'fuel_type' => 'required',
            'transmission' => 'required',
            'customer_id' => 'required|exists:customers,id',
        ]);

        $car = Car::find($id);
        $car->registration_number = $request->input('registration_number');
        $car->model = $request->input('model');
        $car->fuel_type = $request->input('fuel_type');
        $car->transmission = $request->input('transmission');
        $car->customer_id = $request->input('customer_id');
        $car->save();

        return redirect()->route('cars.index')->with('success', 'Car updated successfully!');
    }

    /**
     * Remove the specified car from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
// In App\Http\Controllers\CarController.php

public function destroy($id)
{
    $car = Car::find($id);
    $car->serviceJobs()->delete(); // Delete related service jobs
    $car->delete();

    return redirect()->route('cars.index')->with('success', 'Car deleted successfully!');
}
}
