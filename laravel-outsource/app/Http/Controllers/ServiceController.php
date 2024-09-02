<?php
// ServiceController.php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Service;
use App\Models\ServiceJob;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller {
    public function servicePage(Request $request){
        $customers = Customer::all();

        $search_query = $request->input('search_query');
        $search_by = $request->input('search_by');

        $cars = Car::when($search_query, function ($query) use ($search_query, $search_by) {
            if ($search_by == 'nic') {
                $query->whereHas('customer', function ($query) use ($search_query) {
                    $query->where('nic', 'like', "%{$search_query}%");
                });
            } elseif ($search_by == 'email') {
                $query->whereHas('customer', function ($query) use ($search_query) {
                    $query->where('email', 'like', "%{$search_query}%");
                });
            } elseif ($search_by == 'name') {
                $query->whereHas('customer', function ($query) use ($search_query) {
                    $query->where('name', 'like', "%{$search_query}%");
                });
            }
        })->get();

        $tasks = Task::with('section')->get();

        return view('cars.add-service', compact('customers', 'cars', 'tasks'));
    }

    public function initiateService(Request $request, Car $car)
    {
        $tasks = Task::with('section')->get();
        return view('cars.initiate-service', compact('car', 'tasks'));
    }

// In your CarController
// In your CarController
public function addService(Request $request, Car $car)
{
    $carId = $request->input('car_id');
    $taskIds = $request->input('task_id');

    foreach ($taskIds as $taskId) {
        $service = new Service();
        $service->car_id = $carId;
        $service->task_id = $taskId; // Set the task_id column
        $service->status = 'pending';
        $service->save();

        $serviceJob = new ServiceJob();
        $serviceJob->car_id = $carId;
        $serviceJob->service_id = $service->id;
        $serviceJob->task_id = $taskId;
        $serviceJob->status = 'pending';
        $serviceJob->save();
    }

    return redirect()->route('cars.index');
}

}
