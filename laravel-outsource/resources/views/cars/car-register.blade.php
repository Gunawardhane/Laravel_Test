<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Cars') }}
        </h2>
    </x-slot>

    <div class="flex justify-center pt-10">
        <form class="max-w-sm" method="POST" action="{{ route('cars.store') }}">
            @csrf
            <div class="mb-5">
                <label for="user_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Customer ID
                </label>
                <input type="text" id="user_id" name="user_id"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" />
            </div>
            <div class="mb-5">
                <label for="registration_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">
                    Registration Number
                </label>
                <input type="text" id="registration_number" name="registration_number"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>
            <div class="mb-5">
                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Model</label>
                <input type="text" id="model" name="model"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                    required />
            </div>

            <label for="fuel_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Fuel
                Type</label>
            <select id="fuel_type" name="fuel_type"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="petrol">Petrol</option>
                <option value="diesel">Diesel</option>
                <option value="hybrid">Hybrid</option>
            </select>

            <label for="transmission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black pt-5">
                Transmission
            </label>
            <select id="transmission" name="transmission"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="auto">Auto</option>
                <option value="manual">Manual</option>
            </select>

            <div class="flex justify-center pt-5">
                <button type="submit"
                    class="text-white bg-black hover:bg-black focus:ring-4 focus:outline-none focus:ring-black font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-black dark:hover:bg-black dark:focus:ring-black">
                    Register new account
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
