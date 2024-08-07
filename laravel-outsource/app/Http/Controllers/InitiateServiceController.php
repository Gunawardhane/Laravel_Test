<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Job;
use App\Models\ServiceRequest;

class InitiateServiceController extends Controller
{
    public function create(Car $car)
    {
        $jobs = Job::all();
        return view('cars.car-initiate-service', compact('car', 'jobs'));
    }

    public function store(Request $request, Car $car)
    {
        $request->validate([
            'washing' => 'required|array',
            'interior' => 'required|array',
            'service' => 'required|array',
        ]);

        $serviceRequestData = [
            'car_id' => $car->id,

        ];

        $serviceRequest = $car->serviceRequests()->create($serviceRequestData);

        if ($request->input('washing')) {
            foreach ($request->input('washing') as $washingJob) {
                $job = Job::where('name', $washingJob)->first();
                if ($job) {
                    $serviceRequest->jobs()->attach($job->id);
                }
            }
        }

        if ($request->input('interior')) {
            foreach ($request->input('interior') as $interiorJob) {
                $job = Job::where('name', $interiorJob)->first();
                if ($job) {
                    $serviceRequest->jobs()->attach($job->id);
                }
            }
        }

        if ($request->input('service')) {
            foreach ($request->input('service') as $serviceJob) {
                $job = Job::where('name', $serviceJob)->first();
                if ($job) {
                    $serviceRequest->jobs()->attach($job->id);
                }
            }
        }

        return redirect()->route('initiate.service', ['carId' => $car->id])->with('success', 'Service request initiated successfully!');
    }
}
