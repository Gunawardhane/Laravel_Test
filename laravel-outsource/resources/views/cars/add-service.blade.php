<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Service') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-4 md:p-6 lg:p-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Cars</h1>

        <form action="{{ route('cars.index') }}" method="get">
            <div class="flex flex-wrap mb-4">
                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <label for="search_query" class="block text-sm font-bold mb-2">Search by:</label>
                    <input type="text" id="search_query" name="search_query"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <label for="search_by" class="block text-sm font-bold mb-2">Search by:</label>
                    <select id="search_by" name="search_by" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        <option value="nic">NIC</option>
                        <option value="email">Email</option>
                        <option value="name">Name</option>
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3 mb-4 md:mb-0">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
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
                        <td class="border border-gray-300 p-2">
                            <a href="{{ route('initiate-service', $car->id) }}" data-toggle="modal"
                                data-target="#initiateServiceModal"
                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add
                                Service</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="initiateServiceModal" tabindex="-1" role="dialog"
            aria-labelledby="initiateServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="initiateServiceModalLabel">Initiate Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Render the initiate-service view here -->
                        <div id="initiate-service-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#initiateServiceModal').on('show.bs.modal', function(event) {
                var carId = $(event.relatedTarget).data('car-id');
                var url = '{{ route('initiate-service', ':car') }}'.replace(':car', carId);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        $('#initiate-service-content').html(data);
                    }
                });
            });
        });
    </script>
</x-app-layout>
