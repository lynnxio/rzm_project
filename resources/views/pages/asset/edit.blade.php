<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 leading-tight">
			{{ __('Edit Assets') }}
		</h2>
	</x-slot>
	<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 bg-white my-10 rounded shadow-md">
		<form method="post" action="{{ route('assets.update', $asset->id) }}">
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
			</div>
			@csrf
			@method('PATCH')
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="name" class="form-label inline-block mb-2 text-gray-700">Name</label>
					<input name="name" type="text"
					       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					       id="name" placeholder="" value="{{$asset->name}}"/>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 w-96">
					<label for="formFile" class="form-label inline-block mb-2 text-gray-700">Image:</label>
					<x-input name="search"/>
					<input class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					       type="file" id="formFile">
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="category">Category:</label>
					<select id="category"
					        class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					        aria-label="Default select example"
					        name="category_id">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}"
									{{ $asset->category_id === $category->id ? 'selected' : '' }}>{{ $category->name }}
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
						@foreach ($statuses as $status)
							<option value="{{ $status->id }}"
									{{ $asset->category_id === $status->id ? 'selected' : '' }}>{{ $status->name }}
							</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="mb-3 xl:w-96">
					<label for="qty_balance" class="form-label inline-block mb-2 text-gray-700"
					>Quantity</label
					>
					<input type="number"
					       class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
					       id="qty_balance"
					       name="qty_balance"
					       placeholder="Number input"
					       value="{{$asset->qty_balance}}"
					/>
				</div>
			</div>
			<div class="flex justify-center">
				<button type="submit"
				        class="mx-1 px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
					Save
				</button>
				<a href="{{ url()->previous() }}"
				   class=" px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">Cancel</a>
			</div>
		</form>
	</div>
</x-app-layout>
w
