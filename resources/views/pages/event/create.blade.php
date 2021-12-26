<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Create Event') }}
		</h2>
	</x-slot>
	<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white my-10 rounded shadow-md">
		<form method="post" action="{{ route('events.store') }}">
			<div class="flex justify-center">
				@if ($errors->any())
					<div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div><br/>
				@endif
				@if ($message = Session::get('success'))
					<div class="bg-blue-100 rounded-lg py-5 px-6 mb-4 text-base text-blue-700 mb-3" role="alert">
						{{$message}}
					</div>
				@endif
			</div>
			@csrf
			<div class="grid grid-cols-2 gap-4">
				<x-TailwindElement.date-picker>
					<x-slot name="name">start_date</x-slot>
					<x-slot name="title">Borrow Date</x-slot>
				</x-TailwindElement.date-picker>
				<x-TailwindElement.date-picker>
					<x-slot name="name">end_date</x-slot>
					<x-slot name="title">Return Date</x-slot>
				</x-TailwindElement.date-picker>
			</div>

			<x-TailwindElement.select>
				<x-slot name="name">status_id</x-slot>
				<x-slot name="data">status</x-slot>
				<x-slot name="title">Status</x-slot>
			</x-TailwindElement.select>

			<x-TailwindElement.select>
				<x-slot name="name">asset_id</x-slot>
				<x-slot name="data">asset</x-slot>
				<x-slot name="title">Asset</x-slot>
			</x-TailwindElement.select>

			<x-TailwindElement.input>
				<x-slot name="label">Quantity</x-slot>
				<x-slot name="id">quantity</x-slot>
				<x-slot name="placeholder">Quantity</x-slot>
				<x-slot name="name">qty</x-slot>
				<x-slot name="type">number</x-slot>
			</x-TailwindElement.input>

			<x-TailwindElement.button type="submit" class="bg-blue-600 ">
				Submit
			</x-TailwindElement.button>
		</form>
	</div>
</x-app-layout>
