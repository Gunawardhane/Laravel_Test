<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Jobs') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow-lg">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-sm overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-700">
                    <th class="border-b border-gray-300 p-4">Car Registration Number</th>
                    <th class="border-b border-gray-300 p-4">Completed Percentage</th>
                    <th class="border-b border-gray-300 p-4">Estimated Finish Time</th>
                    <th class="border-b border-gray-300 p-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendingJobs as $job)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="border-b border-gray-300 p-4">{{ $job->car->registration_number }}</td>
                        <td class="border-b border-gray-300 p-4">{{ $job->car->completedPercentage }}%</td>
                        <td class="border-b border-gray-300 p-4">{{ $job->car->estimatedFinishTime }}</td>
                        <td class="border-b border-gray-300 p-4 flex items-center space-x-2">
                            {{-- <a href="{{ route('view-job-detail', $job->car->id) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-400">
                                View Detail
                            </a> --}}
                            <form action="{{ route('update-job-status', $job->car->id) }}" method="POST"
                                class="flex items-center">
                                @csrf
                                <select name="status" id="status"
                                    class="form-select border border-gray-300 rounded-md py-2 px-7 text-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                </select>
                                <button type="submit"
                                    class="bg-orange-500 hover:bg-orange-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-orange-400 ml-2">
                                    Update Status
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
