<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Create Event') }}
		</h2>
	</x-slot>
	<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white my-10 rounded shadow-md">
		<form method="post" action="{{ route('events.store') }}" enctype="multipart/form-data">
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
			@method('PATCH')
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="start_date" class="font-bold mb-1 text-gray-700 block">Borrow Date</label>
					<x-buk-flat-pickr id="start_date" name="start_date"
					                  class="w-full pl-4 pr-10 py-2 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium "/>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="end_date" class="font-bold mb-1 text-gray-700 block">Return Date</label>
					<x-buk-flat-pickr id="end_date" name="end_date"
					                  class="w-full pl-4 pr-10 py-2 leading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600 font-medium "/>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="status">Status</label>
					<select class="form-select appearance-none
      block
      w-full
      pr-5
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
					        name="status_id" id="status">
						<option selected>Set asset status...</option>
						@foreach($statuses as $status)
							<option value="{{$status->id}}">{{$status->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="asset">Asset</label>
					<select class="form-select appearance-none
      block
      w-full
      pr-5
      py-1.5
      text-base
      font-normal
      text-gray-700
      bg-white bg-clip-padding bg-no-repeat
      border border-solid border-gray-300
      rounded
      transition
      ease-in-out
      m-0
      focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
					        name="asset_id" id="asset">
						<option selected>Choose your item...</option>
						@foreach($assets as $asset)
							<option value="{{$asset->id}}">{{$asset->name}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<x-buk-label for="quantity" class="form-label inline-block mb-2 text-gray-700">Quantity:
					</x-buk-label>
					<x-buk-input type="number"
					             class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded 	transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					             id="quantity" placeholder="Quantity" name="qty"/>

				</div>
			</div>


			<x-TailwindElement.button type="submit" class="bg-blue-600">
				Submit
			</x-TailwindElement.button>
		</form>
	</div>
</x-app-layout>
