<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Events Management') }}
			<a href="{{route('events.create')}}">
				<span class="inline-block py-1.5 px-2.5 leading-none text-center whitespace-nowrap align-baseline font-bold bg-blue-600 text-white rounded">Add New</span>
			</a>
		</h2>
	</x-slot>
	<div class="w-full mx-auto">
		<table class="w-full table-auto rounded-sm">
			<thead>
			<tr>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					User Name
				</th>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Item Name
				</th>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Quantity
				</th>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Borrow Date:
				</th>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Return Date:
				</th>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Status:
				</th>
				<th class="px-4 py-4 text-left bg-blue-900 text-white text-sm font-medium">
					Action:
				</th>
			</tr>
			</thead>
			<tbody>

			@foreach ($events as $event)
				<tr class="border-gray-300">
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{$event->user->name}}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{$event->asset->name}}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{$event->qty}}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{$event->start_date}}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{$event->end_date}}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						{{$event->status->name}}
					</td>
					<td class="px-4 py-8 border-t border-b border-gray-300 text-sm">
						<a href="{{ route('events.edit', $event->id) }}"><span
									class="inline-block rounded-sm font-medium border border-solid cursor-pointer text-center text-xl py-1 px-5 text-white bg-green-400 border-green-400 hover:bg-green-600 hover:border-green-600">
                                    Edit
                                </span></a>
						<form action="{{ route('events.destroy', $event->id) }}" method="post"
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






































































































































































































































































































































































































































































































































































