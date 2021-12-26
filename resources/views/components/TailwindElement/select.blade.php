<div class="flex justify-center">
	<div class="mb-3 xl:w-96">
		<label for="{{$name}}">{{$title}}</label>
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
		        name="{{$name}}" id="{{$name}}">
			<option selected>Select...</option>
			@if ($data == 'status')
				@foreach($statuses as $status)
					<option value="{{$status->id}}">{{$status->name}}</option>
				@endforeach
			@endif

			@if ($data == 'asset')
				@foreach($assets as $asset)
					<option value="{{$asset->id}}">{{$asset->name}}</option>
				@endforeach
			@endif

		</select>
	</div>
</div>
