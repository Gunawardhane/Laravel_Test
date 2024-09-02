<?php
namespace App\Http\Controllers;

use App\Mail\CarsStatusCompleted;
use App\Models\Car;
use App\Models\Job;
use App\Models\ServiceJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function getCurrentJobs()
    {
        $processingCars = Car::where('status', 'processing')->get();
        foreach ($processingCars as $car) {
            // Create a new service job for each car
            $serviceJob = new ServiceJob();
            $serviceJob->car_id = $car->id;
            $serviceJob->service_id = 1; // Assuming a default service ID
            $serviceJob->status = 'pending';
            $serviceJob->save();
        }
        $pendingJobs = ServiceJob::where('status', 'pending')->get();
        return view('jobs.current-jobs', compact('processingCars', 'pendingJobs'));
    }

    public function updateJobStatus(Request $request, Car $car)
    {
        Log::info('Entering updateJobStatus method');

        // Get the service job that needs to be updated
        $serviceJob = ServiceJob::where('car_id', $car->id)->where('status', 'pending')->firstOrFail();

        // Update service job status
        $serviceJob->status = $request->input('status');
        $serviceJob->save();

        Log::info('Service job updated successfully');

        // Calculate completed percentage
        $appliedJobs = ServiceJob::where('car_id', $car->id)->where('status', 'completed')->count();
        $totalJobs = ServiceJob::where('car_id', $car->id)->count();
        $car->completedPercentage = ($appliedJobs / $totalJobs) * 100;

        Log::info('Completed percentage calculated: ' . $car->completedPercentage);

        // Calculate estimated finish time
        $car->estimatedFinishTime = $this->calculateEstimatedFinishTime($car);

        Log::info('Estimated finish time calculated: ' . $car->estimatedFinishTime);

        // Save the updated car attributes
        $car->save();

        Log::info('Car attributes saved successfully');

        // Check if completed percentage is 100% or status is manually set to completed
        if ($car->completedPercentage == 100 || $request->input('status') == 'completed') {
            $car->status = 'completed';
            Log::info('Car status updated to completed');

            // Send email to customer
            $this->sendEmailToCustomer($car);
        }

        return redirect()->route('current-jobs');
    }

    // Method to send email to customer
    private function sendEmailToCustomer(Car $car)
    {
        Log::info('About to send email to ' . $car->customer->email);
        try {
            Mail::to($car->customer->email)->send(new CarsStatusCompleted($car));
            Log::info('Email sent successfully to ' . $car->customer->email);
        } catch (\Exception $e) {
            Log::error('Error sending email: ' . $e->getMessage());
        }
    }




    // Method to calculate estimated finish time
    private function calculateEstimatedFinishTime(Car $car)
    {
        // Assuming you have a method to calculate the estimated finish time
        // based on the remaining jobs and average service time
        $remainingJobs = ServiceJob::where('car_id', $car->id)->where('status', 'pending')->count();
        $averageServiceTime = 2; // Assume an average service time of 2 hours
        $estimatedFinishTime = now()->addHours($remainingJobs * $averageServiceTime);
        return $estimatedFinishTime->format('Y-m-d H:i:s'); // Format as a datetime string
    }

    // private function sendEmailToCustomer(Car $car)
    // {
    //     // Get customer email and bill details
    //     $customerEmail = $car->customer->email;
    //     $billDetails = $car->serviceJobs->map(function ($job) {
    //         return [
    //             'service' => $job->service->name,
    //             'cost' => $job->service->cost,
    //         ];
    //     });

    //     // Create email message
    //     $message = 'Dear ' . $car->customer->name . ',<br>';
    //     $message .= 'Your car ' . $car->registration_number . ' has been completed.<br>';
    //     $message .= 'Please find the bill details below:<br>';
    //     $message .= '<table>';
    //     $message .= '<tr><td>Service</td><td>Cost</td></tr>';
    //     foreach ($billDetails as $detail) {
    //         $message .= '<tr><td>' . $detail['service'] . '</td><td>' . $detail['cost'] . '</td></tr>';
    //     }
    //     $message .= '</table>';
    //     $message .= 'Thank you for choosing our service.';

    //     // Send email using Laravel's Mail facade
    //     Mail::to($customerEmail)->send(new \App\Mail\CompletedJobEmail($message));
    // }
}
