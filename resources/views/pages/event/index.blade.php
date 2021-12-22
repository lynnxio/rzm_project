<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events Management') }}
        </h2>
    </x-slot>
    <div class="w-full mx-auto">
        <table class="w-full table-auto rounded-sm">
            <thead>
                <tr>
                    <th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
                        Image
                    </th>
                    <th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
                        Name
                    </th>
                    <th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
                        Quantity
                    </th>
                    <th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
                        Category
                    </th>
                    <th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
                        Status
                    </th>
                    <th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
                        Updated at
                    </th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-app-layout>
