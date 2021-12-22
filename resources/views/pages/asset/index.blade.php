<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Assets List') }}
			<a href="{{route('assets.create')}}">
				<span class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded">Add New</span>
			</a>
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
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Actions
				</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($assets as $asset)
				<tr class="border-gray-300">
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						<img src="{{ $asset->image }}" class="h-8"
						     style="/* width: 100%; */ /* height: auto; */"/>
					</td>

					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{ $asset->name }}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{ $asset->qty_balance }}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">{{ $asset->category->name }}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">{{ $asset->status->name }}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{ $asset->updated_at->diffForHumans() }}</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						<a href="{{ route('assets.edit', $asset->id) }}"><span
									class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-xl py-1 px-5 text-white bg-green-400 border-green-400 hover:bg-green-600 hover:border-green-600">
                                    Edit
                                </span></a>
						<form action="{{ route('assets.destroy', $asset->id) }}" method="post"
						      style="display: inline-block">
							@csrf
							@method('DELETE')
							<button
									class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-xl py-1 px-5 text-white bg-red-400 border-red-400 hover:bg-red-600 hover:border-red-600"
									type="submit">Delete
							</button>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</x-app-layout>
