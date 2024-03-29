<div class="flex justify-center">
	<div class="mb-3 xl:w-96">
		<label for="{{$id}}" class="form-label inline-block mb-2 text-gray-700">{{$label}}</label>
		<input type="{{$type}}" {{$attributes->merge([
    	'class' => 'form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded 	transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none'
	])}} id="{{$id}}" placeholder="{{$placeholder}}" name="{{$name}}" value="{{$value}}"/>
	</div>
</div>
