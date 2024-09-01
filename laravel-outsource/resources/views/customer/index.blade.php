{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Customer') }}
        </h2>
    </x-slot>

    <h1>Customers</h1>

    <ul>
        @foreach ($customers as $customer)
            <li>
                {{ $customer->name }} ({{ $customer->email }})
            </li>
        @endforeach
    </ul>
</x-app-layout> --}}

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Customer') }}
        </h2>
    </x-slot>

    <h1 class="text-3xl font-bold text-center mb-4">Customers</h1>

    <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @foreach ($customers as $customer)
            <div class="mb-4">
                <p class="text-lg font-bold">ID: {{ $customer->id }}</p>
                <p class="text-lg">Name: {{ $customer->name }}</p>
                <p class="text-lg">Email: {{ $customer->email }}</p>
                <p class="text-lg">Created At: {{ $customer->created_at }}</p>
                <p class="text-lg">Updated At: {{ $customer->updated_at }}</p>
            </div>
            <hr class="border-b border-gray-200">
        @endforeach
    </div>
</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Customer') }}
        </h2>
    </x-slot>

    <h1 class="text-3xl font-bold text-center mb-4">Customers</h1>

    <div class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <input type="search" id="search" class="w-full px-4 py-2 text-lg text-gray-700" placeholder="Search by email">
        <table class="w-full table-auto mb-4">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-lg text-gray-700">ID</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Name</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Email</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Created At</th>
                    <th class="px-4 py-2 text-lg text-gray-700">Updated At</th>
                </tr>
            </thead>
            <tbody id="customer-list">
                @foreach ($customers as $customer)
                    <tr>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $customer->id }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $customer->name }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $customer->email }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $customer->created_at }}</td>
                        <td class="px-4 py-2 text-lg text-gray-700">{{ $customer->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const searchInput = document.getElementById('search');
        const customerList = document.getElementById('customer-list');

        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const rows = customerList.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const emailCell = row.getElementsByTagName('td')[2];

                if (emailCell.textContent.toLowerCase().includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
</x-app-layout>
