<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Job;
use App\Models\Service;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // public function search(Request $request){
    //     $search = $request->input('search');
    //     $customers = User::where('name', 'LIKE', "%{$search}%")
    //         ->orWhere('nic', 'LIKE', "%{$search}%")
    //         ->orWhere('email', 'LIKE', "%{$search}%")
    //         ->with('cars')
    //         ->get();
    //     return view('search', compact('customers'));
    // }

    // public function initiateService($carId)
    // {
    //     $car = Car::find($carId);
    //     $jobs = Job::all();
    //     return view('cars.car-initiate-service', compact('car', 'jobs'));
    // }


    public function index()
    {
        $customers = Customer::paginate(10);
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.customer-register');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nic' => 'required|unique:customers',
            'name' => 'required',
            'email' => 'required|email|unique:customers',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);
        Customer::create($data);

        return redirect()->route('customers.index')->with('success', 'Customer registered successfully.');
    }

    public function show(Customer $customer)
    {
        $cars = $customer->cars;
        return view('customers.show', compact('customer', 'cars'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($data);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
    public function searchCustomer(Request $request)
    {
        $search = $request->input('search');

        $customers = Customer::where('name', 'like', '%' . $search . '%')
            ->orWhere('nic', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->with('cars')
            ->get();

        return view('admin.search-customer', compact('customers'));
    }

    public function initiateService($carId)
    {
        $car = Car::find($carId);
        $sections = Task::select('section_id')->distinct()->get();
        $tasks = Task::all();

        return view('cars.initiate-service', compact('car', 'sections', 'tasks'));
    }

    public function confirmService(Request $request)
    {
        $carId = $request->input('car_id');
        $tasks = $request->input('tasks');

        foreach ($tasks as $taskId) {
            Service::create([
                'car_id' => $carId,
                'task_id' => $taskId,
                'status' => 'pending',
            ]);
        }

        return redirect()->route('admin.search-customer')->with('success', 'Service confirmed successfully!');
    }
}
