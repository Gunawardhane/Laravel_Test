{{-- <x-app-layout>
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
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Cars') }}
        </h2>
    </x-slot>

    <h1 class="text-3xl font-bold text-center mb-4">Cars</h1>

    <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="search" id="search" class="w-full px-4 py-2 text-lg text-gray-700"
            placeholder="Search by registration number, model, or customer">
        <select id="customer-filter" class="w-full px-4 py-2 text-lg text-gray-700">
            <option value="">All Customers</option>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
            @endforeach
        </select>
        <table class="w-full table-auto mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-lg text-gray-700">Registration Number</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Model</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Fuel Type</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Transmission</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Customer</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody id="car-list">
                @foreach ($cars as $car)
                    <tr>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $car->registration_number }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $car->model }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $car->fuel_type }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $car->transmission }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $car->customer->name }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">
                            <a href="{{ route('cars.edit', $car->id) }}"
                                class="text-blue-600 hover:text-blue-900">Edit</a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('cars.create') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register New Car</a>
    </div>

    <script>
        const searchInput = document.getElementById('search');
        const customerFilter = document.getElementById('customer-filter');
        const carList = document.getElementById('car-list');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const rows = carList.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const registrationNumberCell = row.getElementsByTagName('td')[0];
                const modelCell = row.getElementsByTagName('td')[1];
                const customerCell = row.getElementsByTagName('td')[4];

                if (registrationNumberCell.textContent.toLowerCase().includes(searchTerm) ||
                    modelCell.textContent.toLowerCase().includes(searchTerm) ||
                    customerCell.textContent.toLowerCase().includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });

        customerFilter.addEventListener('change', (e) => {
            const customerId = e.target.value;
            const rows = carList.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const customerCell = row.getElementsByTagName('td')[4];

                if (customerId === '' || customerCell.textContent.includes($(`option:selected`, customerFilter)
                        .text())) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
</x-app-layout>
