<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Customer') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-4 md:p-6 lg:p-8">
        <form action="{{ route('admin.search-customer') }}" method="get">
            @csrf
            <div class="flex flex-wrap mb-4">
                <label for="search" class="block text-sm font-medium text-gray-700">Search by:</label>
                <input type="text" id="search" name="search" class="w-full pl-10 text-sm text-gray-700"
                    placeholder="NIC, Email or Name">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
            </div>
        </form>

        @if ($customers->count() > 0)
            <h2 class="text-lg font-bold mb-4">Search Results:</h2>
            <ul class="list-none mb-4">
                @foreach ($customers as $customer)
                    <li>
                        {{ $customer->name }} ({{ $customer->nic }})
                        @if ($customer->cars->count() > 0)
                            <ul>
                                @foreach ($customer->cars as $car)
                                    <li>
                                        {{ $car->registration_number }} - {{ $car->model }}
                                        <a href="{{ route('admin.initiate-service', $car->id) }}"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Initiate
                                            Service</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No cars registered.</span>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500">No customers found.</p>
        @endif
    </div>
</x-app-layout>
