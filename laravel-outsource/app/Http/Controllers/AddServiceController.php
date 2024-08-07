<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class AddServiceController extends Controller
{
    public function index()
    {
        return view('cars.car-service');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $customers = User::where('name', 'LIKE', "%{$search}%")
            ->orWhere('nic', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->with('cars')
            ->get();
            return view('cars.car-service', ['customers' => $customers]);
    }

    public function initiateService($carId)
    {
        $car = Car::find($carId);
        $jobs = Job::all();
        return view('initiate_service', compact('car', 'jobs'));
    }
}
