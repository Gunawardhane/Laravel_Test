<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Job;

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
            'user_id' => 'required|exists:users,id',
        ]);

        Car::create($validatedData);

        return redirect()->route('car.manage')->with('success', 'Car registered successfully!');
    }

    public function manage(Request $request) {
        $registration_number = $request->input('registration_number');
        $model = $request->input('model');
        $customer_name = $request->input('customer_name');

        $cars = Car::query()
            ->join('users', 'cars.user_id', '=', 'users.id')
            ->when($registration_number, function ($query, $registration_number) {
                return $query->where('registration_number', 'LIKE', "%{$registration_number}%");
            })
            ->when($model, function ($query, $model) {
                return $query->where('model', 'LIKE', "%{$model}%");
            })
            ->when($customer_name, function ($query, $customer_name) {
                return $query->where('users.name', 'LIKE', "%{$customer_name}%");
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
            'user_id' => 'required|exists:users,id',
        ]);

        $car->update($validatedData);

        return redirect()->route('car.manage')->with('success', 'Car updated successfully!');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('car.manage')->with('success', 'Car deleted successfully!');
    }

    public function initiateService(Request $request, $carId)
    {
        $car = Car::find($carId);
        $jobs = $request->input('jobs');
        if ($jobs) {
            foreach ($jobs as $jobId) {
                $job = Job::find($jobId);
                if ($job) {
                    $car->jobs()->attach($job, ['status' => 'pending']);
                }
            }
        }
        return redirect()->route('search.customers')->with('success', 'Service initiated successfully!');
    }
}
