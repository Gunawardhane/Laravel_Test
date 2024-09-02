<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Jobs') }}
        </h2>
    </x-slot>

    <table class="table-auto border-collapse w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 p-2">Car Registration Number</th>
                <th class="border border-gray-300 p-2">Completed Percentage</th>
                <th class="border border-gray-300 p-2">Estimated Finish Time</th>
                <th class="border border-gray-300 p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pendingJobs as $job)
                <tr>
                    <td class="border border-gray-300 p-2">{{ $job->car->registration_number }}</td>
                    <td class="border border-gray-300 p-2">{{ $job->car->completedPercentage }}%</td>
                    <td class="border border-gray-300 p-2">{{ $job->car->estimatedFinishTime }}</td>
                    <td class="border border-gray-300 p-2">
                        <a href="{{ route('view-job-detail', $job->car->id) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View Detail</a>
                        <form action="{{ route('update-job-status', $job->car->id) }}" method="POST">
                            @csrf
                            <select name="status" id="status" class="form-select">
                                <option value="">Select Status</option>
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>
                            <button type="submit"
                                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                Update Status
                            </button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>
