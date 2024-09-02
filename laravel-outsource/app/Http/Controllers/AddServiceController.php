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
        $searchBy = $request->input('search_by');

        $customers = User::where($searchBy, 'LIKE', "%{$search}%")
            ->with('cars')
            ->get();

        return view('cars.add-service', compact('customers'));
    }
    public function initiateService($carId)
    {
        $car = Car::find($carId);
        $jobs = Job::all();
        return view('cars.car-initiate-service', compact('car', 'jobs'));
    }
}
