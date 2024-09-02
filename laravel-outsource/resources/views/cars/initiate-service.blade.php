<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Initiate Service') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-6 lg:p-8 bg-white rounded-lg shadow-md">
        @if (isset($car))
            <h2 class="text-2xl font-bold text-center mb-6">Initiate Service for {{ $car->registration_number }}</h2>
        @else
            <h2 class="text-2xl font-bold text-center text-red-600 mb-6">Car not found</h2>
        @endif

        @if (isset($car))
            <form action="{{ route('add-service', $car) }}" method="post">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">

                <table class="table-auto w-full mb-6">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 text-left text-gray-700">Select</th>
                            <th class="px-4 py-2 text-left text-gray-700">Task Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-t">
                                    <input type="checkbox" name="task_id[]" value="{{ $task->id }}"
                                        class="form-checkbox h-5 w-5 text-blue-600">
                                </td>
                                <td class="px-4 py-2 border-t">
                                    <label class="text-gray-800">{{ $task->name }}</label>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-center">
                    <button type="submit"
                        class="inline-flex items-center px-6 py-3 bg-blue-500 hover:bg-blue-700 text-white text-lg font-bold rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 transition">
                        Add Service
                    </button>
                </div>
            </form>
        @endif
    </div>
</x-app-layout>
