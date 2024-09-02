<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="GET" action="{{ route('car.manage') }}" class="mb-4 flex flex-wrap gap-4">
                        <input type="text" name="registration_number" placeholder="Registration Number"
                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            value="{{ request('registration_number') }}">

                        <input type="text" name="model" placeholder="Model"
                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            value="{{ request('model') }}">

                        <input type="text" name="customer_name" placeholder="Customer Name"
                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            value="{{ request('customer_name') }}">

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
                    </form>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">Registration Number</th>
                                <th scope="col" class="py-3 px-6">Model</th>
                                <th scope="col" class="py-3 px-6">Fuel Type</th>
                                <th scope="col" class="py-3 px-6">Transmission</th>
                                <th scope="col" class="py-3 px-6">Customer Name</th>
                                <th scope="col" class="py-3 px-6">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-4 px-6">{{ $car->registration_number }}</td>
                                    <td class="py-4 px-6">{{ $car->model }}</td>
                                    <td class="py-4 px-6">{{ $car->fuel_type }}</td>
                                    <td class="py-4 px-6">{{ $car->transmission }}</td>
                                    <td class="py-4 px-6">{{ $car->user?->name }}</td>
                                    <td class="py-4 px-6">
                                        <a href="{{ route('cars.edit', $car) }}"
                                            class="text-blue-600 hover:text-blue-900">Edit</a>
                                        <form action="{{ route('cars.destroy', $car) }}" method="post" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $cars->appends(request()->except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
