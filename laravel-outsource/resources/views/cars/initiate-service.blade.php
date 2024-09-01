<!-- resources/views/cars/initiate-service.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Initiate Service') }}
        </h2>
    </x-slot>

    <div class="max-w-md mx-auto p-4 md:p-6 lg:p-8">
        @if (isset($car))
            <h2>Initiate Service for {{ $car->registration_number }}</h2>
        @else
            <h2>Car not found</h2>
        @endif

        <form action="{{ route('add-service', $car) }}" method="post">
            @csrf
            <input type="hidden" name="car_id" value="{{ $car->id }}">
            @foreach ($tasks as $task)
                <div>
                    <input type="checkbox" name="task_id" value="{{ $task->id }}">
                    <label>{{ $task->name }}</label>
                </div>
            @endforeach
            <button type="submit">Add Service</button>
        </form>
    </div>
</x-app-layout>
