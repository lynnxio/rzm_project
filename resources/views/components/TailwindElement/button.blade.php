<div class="flex space-x-2 justify-center">
	<button {{$attributes->merge([
    'class' => 'px-6 py-2.5 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out'
])}}>
		{{$slot}}
	</button>
</div>
