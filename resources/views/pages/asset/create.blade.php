<x-app-layout>
	<x-slot name="header">
		<h2 class="text-xl font-semibold leading-tight text-gray-800">
			{{ __('Create Asset') }}
		</h2>
	</x-slot>
	<div class="px-4 py-6 mx-auto my-10 max-w-7xl bg-white rounded shadow-md sm:px-6 lg:px-8">
		<form method="post" action="{{ route('assets.store') }}" enctype="multipart/form-data">
			<div class="flex justify-center">
				@if ($errors->any())
					<div class="px-6 py-5 mb-3 mb-4 text-base text-red-700 bg-red-100 rounded-lg" role="alert">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div><br/>
				@endif
				@if ($message = Session::get('success'))
					<div class="px-6 py-5 mb-3 mb-4 text-base text-blue-700 bg-blue-100 rounded-lg" role="alert">
						{{$message}}
					</div>
				@endif
			</div>
			@csrf
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="name" class="inline-block mb-2 text-gray-700 form-label">Name</label>
					<input name="name" type="text"
					       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					       id="name" placeholder=""/>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 w-96">
					<label for="formFile" class="inline-block mb-2 text-gray-700 form-label">Image:</label>
					<input type="file" id="formFile" name="image"
					       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="category">Category:</label>
					<select id="category"
					        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					        aria-label="Default select example"
					        name="category_id">
						<option selected disabled>Please choose...</option>
						@foreach ($categories as $category)
							<option value="{{ $category->id }}">{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="status">Status:</label>
					<select id="status"
					        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					        aria-label="Default select example"
					        name="status_id">
						<option selected disabled>Please choose...</option>
						@foreach ($statuses as $status)
							<option value="{{ $status->id }}">{{ $status->name }}
							</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="qty_balance" class="inline-block mb-2 text-gray-700 form-label"
					>Quantity</label
					>
					<input
							type="number"
							class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
							id="qty_balance"
							name="qty_balance"
							placeholder="Number input"
					/>
				</div>
			</div>
			<div class="flex justify-center">
				<button type="submit"
				        class="px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
					Save
				</button>
			</div>
		</form>
	</div>
</x-app-layout>
