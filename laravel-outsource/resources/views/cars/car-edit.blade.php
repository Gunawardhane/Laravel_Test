<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="flex justify-center pt-10">
        <form class="max-w-sm" method="POST" action="{{ route('cars.update', $car) }}">
            @csrf
            @method('PUT')
            <div class="mb-5">
                <label for="registration_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Registration Number
                </label>
                <input type="text" id="registration_number" name="registration_number"
                    value="{{ $car->registration_number }}"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>
            <div class="mb-5">
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Model</label>
                <input type="text" id="model" name="model" value="{{ $car->model }}"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>

            <label for="fuel_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fuel
                Type</label>
            <select id="fuel_type" name="fuel_type"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="petrol" {{ $car->fuel_type == 'petrol' ? 'selected' : '' }}>Petrol</option>
                <option value="diesel" {{ $car->fuel_type == 'diesel' ? 'selected' : '' }}>Diesel</option>
                <option value="hybrid" {{ $car->fuel_type == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
            </select>

            <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black pt-5">
                Transmission
            </label>
            <select id="transmission" name="transmission"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="auto" {{ $car->transmission == 'auto' ? 'selected' : '' }}>Auto</option>
                <option value="manual" {{ $car->transmission == 'manual' ? 'selected' : '' }}>Manual</option>
            </select>

            <div class="flex justify-center pt-5">
                <button type="submit"
                    class="text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">
                    Update Car
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
