<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Car') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-4 md:p-6 lg:p-8"> <!-- Add a container with max width and padding -->
        <h1 class="text-3xl font-bold mb-4 text-center">Create New Car</h1>
        <!-- Add text-center to center the heading -->

        <form action="{{ route('cars.store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="registration_number" class="block text-gray-700 text-sm font-bold mb-2">Registration
                    Number</label>
                <input type="text" id="registration_number" name="registration_number"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="model" class="block text-gray-700 text-sm font-bold mb-2">Model</label>
                <input type="text" id="model" name="model"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="fuel_type" class="block text-gray-700 text-sm font-bold mb-2">Fuel Type</label>
                <input type="text" id="fuel_type" name="fuel_type"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="transmission" class="block text-gray-700 text-sm font-bold mb-2">Transmission</label>
                <input type="text" id="transmission" name="transmission"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="customer_id" class="block text-gray-700 text-sm font-bold mb-2">Customer</label>
                <select id="customer_id" name="customer_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                Car</button>
        </form>
    </div>
</x-app-layout>
