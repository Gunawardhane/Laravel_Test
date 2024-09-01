<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Initiate Service') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-4">Initiate Service for Car {{ $car->registration_number }}
            ({{ $car->model }})</h2>

        <form action="{{ route('initiate.service', $car->id) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <h3 class="text-lg font-bold mb-2">Washing Section</h3>
            <label for="washing" class="block text-gray-700 text-sm font-bold mb-2">Select washing options:</label>
            <select id="washing" name="washing[]" multiple
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="full_wash">Full Wash</option>
                <option value="body_wash">Body Wash</option>
            </select>

            <h3 class="text-lg font-bold mb-2 mt-4">Interior Cleaning Section</h3>
            <label for="interior" class="block text-gray-700 text-sm font-bold mb-2">Select interior cleaning
                options:</label>
            <select id="interior" name="interior[]" multiple
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="vacuum">Vacuum</option>
                <option value="shampoo">Shampoo</option>
            </select>

            <h3 class="text-lg font-bold mb-2 mt-4">Service Section</h3>
            <label for="service" class="block text-gray-700 text-sm font-bold mb-2">Select service options:</label>
            <select id="service" name="service[]" multiple
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="engine_oil_replacement">Engine Oil Replacement</option>
                <option value="brake_oil_replacement">Brake Oil Replacement</option>
                <option value="coolant_replacement">Coolant Replacement</option>
                <option value="air_filter_replacement">Air Filter Replacement</option>
                <option value="oil_filter_replacement">Oil Filter Replacement</option>
                <option value="ac_filter_replacement">AC Filter Replacement</option>
                <option value="brake_shoes_replacement">Brake Shoes Replacement</option>
            </select>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Initiate
                Service</button>
        </form>
    </div>
</x-app-layout>
