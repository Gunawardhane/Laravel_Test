<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Services to Cars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="GET" action="{{ route('services.search') }}" class="mb-4 flex flex-wrap gap-4">
                        <input type="text" id="search" name="search" placeholder="Search by NIC, Email or Name"
                            class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5"
                            value="{{ request('search') }}">

                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
                    </form>

                    @if (isset($customers) && $customers->count() > 0)
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">Customer Name</th>
                                    <th scope="col" class="py-3 px-6">NIC</th>
                                    <th scope="col" class="py-3 px-6">Email</th>
                                    <th scope="col" class="py-3 px-6">Registration Number & Car Model</th>
                                    <th scope="col" class="py-3 px-6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6">{{ $customer->name }}</td>
                                        <td class="py-4 px-6">{{ $customer->nic }}</td>
                                        <td class="py-4 px-6">{{ $customer->email }}</td>
                                        <td class="py-4 px-6">
                                            @foreach ($customer->cars as $car)
                                                {{ $car->registration_number }} ({{ $car->model }})
                                                <br>
                                            @endforeach
                                        </td>
                                        <td class="py-4 px-6">
                                            <button
                                                class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                onclick="initiateService({{ $car->id }})">Initiate Service</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No customers found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
