<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Assets Management') }}
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
            <tbody>
                @foreach ($items as $item)
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            <img src="{{ $item->image }}" class="h-8"
                                style="/* width: 100%; */ /* height: auto; */" />
                        </td>

                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            {{ $item->name }}
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            {{ $item->qty_balance }}
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">{{ $item->category->name }}
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">{{ $item->status->name }}
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
                            {{ $item->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
