<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Service') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 lg:p-8 bg-white rounded-lg shadow-md">
        <h1 class="text-3xl font-bold mb-6 text-center">Cars</h1>

        <!-- Search Form -->
        <form action="{{ route('cars.index') }}" method="get" class="mb-6">
            <div class="flex flex-wrap items-end -mx-3">
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <label for="search_query" class="block text-sm font-bold mb-2">Search by:</label>
                    <input type="text" id="search_query" name="search_query"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="w-full md:w-1/3 px-3 mb-4 md:mb-0">
                    <label for="search_by" class="block text-sm font-bold mb-2">Search by:</label>
                    <select id="search_by" name="search_by"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="nic">NIC</option>
                        <option value="email">Email</option>
                        <option value="name">Name</option>
                    </select>
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
                </div>
            </div>
        </form>

        <!-- Cars Table -->
        <table class="table-auto border-collapse w-full shadow-sm rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 p-3 text-left">Registration Number</th>
                    <th class="border border-gray-300 p-3 text-left">Model</th>
                    <th class="border border-gray-300 p-3 text-left">Fuel Type</th>
                    <th class="border border-gray-300 p-3 text-left">Transmission</th>
                    <th class="border border-gray-300 p-3 text-left">Customer</th>
                    <th class="border border-gray-300 p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 p-3">{{ $car->registration_number }}</td>
                        <td class="border border-gray-300 p-3">{{ $car->model }}</td>
                        <td class="border border-gray-300 p-3">{{ $car->fuel_type }}</td>
                        <td class="border border-gray-300 p-3">{{ $car->transmission }}</td>
                        <td class="border border-gray-300 p-3">{{ optional($car->customer)->name }}</td>
                        <td class="border border-gray-300 p-3">
                            <a href="{{ route('initiate-service', $car->id) }}" data-toggle="modal"
                                data-target="#initiateServiceModal" data-car-id="{{ $car->id }}"
                                class="inline-flex items-center justify-center px-4 py-2 bg-gradient-to-r from-green-400 to-green-600 hover:from-green-600 hover:to-green-700 text-white font-bold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                                Add Service
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <div class="fixed z-10 inset-0 overflow-y-auto hidden" id="initiateServiceModal" aria-labelledby="modal-title"
            role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Initiate
                                    Service</h3>
                                <div class="mt-2" id="initiate-service-content">
                                    <!-- Content will be loaded here -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm"
                            data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('a[data-toggle="modal"]').on('click', function(event) {
                event.preventDefault();
                var carId = $(this).data('car-id');
                var url = '{{ route('initiate-service', ':car') }}'.replace(':car', carId);

                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        $('#initiate-service-content').html(data);
                        $('#initiateServiceModal').removeClass('hidden').show();
                    }
                });
            });

            // Close modal functionality
            $('button[data-dismiss="modal"]').on('click', function() {
                $('#initiateServiceModal').addClass('hidden').hide();
            });
        });
    </script>
</x-app-layout>
