<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Cars') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-4 md:p-6 lg:p-8"> <!-- Container with max width and padding -->

        <div class="flex justify-between items-center mb-6"> <!-- Flex container for button and heading -->
            <h1 class="text-3xl font-bold">Cars</h1> <!-- Left-aligned heading -->
            <a href="{{ route('cars.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Car</a>
            <!-- Right-aligned button -->
        </div>

        <form action="{{ route('cars.index') }}" method="get" class="mb-6">
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/3 px-3 mb-4">
                    <label for="registration_number" class="block text-sm font-bold mb-2">Registration Number</label>
                    <input type="text" id="registration_number" name="registration_number"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-4">
                    <label for="model" class="block text-sm font-bold mb-2">Model</label>
                    <input type="text" id="model" name="model"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-4">
                    <label for="customer_id" class="block text-sm font-bold mb-2">Customer</label>
                    <select id="customer_id" name="customer_id"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        <option value="">Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full px-3 mt-4">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                </div>
            </div>
        </form>

        <table class="table-auto border-collapse w-full">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Registration Number</th>
                    <th class="border border-gray-300 p-2">Model</th>
                    <th class="border border-gray-300 p-2">Fuel Type</th>
                    <th class="border border-gray-300 p-2">Transmission</th>
                    <th class="border border-gray-300 p-2">Customer</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $car->registration_number }}</td>
                        <td class="border border-gray-300 p-2">{{ $car->model }}</td>
                        <td class="border border-gray-300 p-2">{{ $car->fuel_type }}</td>
                        <td class="border border-gray-300 p-2">{{ $car->transmission }}</td>
                        <td class="border border-gray-300 p-2">{{ optional($car->customer)->name }}</td>
                        <td class="border border-gray-300 p-2 flex space-x-2">
                            {{-- <a href="{{ route('cars.show', $car->id) }}"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Show</a> --}}
                            <a href="{{ route('cars.edit', $car->id) }}"
                                class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
