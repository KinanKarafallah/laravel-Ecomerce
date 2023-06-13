@props(['product'])
<!-- component -->
<!-- component -->
<!-- This is an example component -->
<div class="" 
	data-te-animation-init
	data-te-animation-start="onScroll"
	data-te-animation-on-scroll="repeat"
	data-te-animation-reset="true"
	data-te-animation="[fade-in_1s_ease-in-out]">


	<div class="w-full max-w-sm mx-5 rounded-md shadow-md overflow-hidden">
		<div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('{{$product->image ? asset('uploads/products/' . $product->image) : asset('/images/reg.jpg')}}')">
			@if ($product->status === 1)
				<form action="{{route('addCart')}}" method="POST">
					@csrf
				
					<button type="submit" class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500" data-te-ripple-init data-te-ripple-color="light">
						<svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
					</button>
					<input type="hidden" name="product_id" value="{{$product->id}}" >
				</form>
				@else
			@endif
		</div>
		<div class="px-5 py-3">
			<h3 class="text-gray-700 uppercase">{{$product->title}}</h3>
			<span class="text-gray-500 mt-2">${{$product->price}}</span>
			<div class="flex items-center mt-2.5 mb-5">
					@if ($product->status === 1)
					<span class="bg-green-400 text-gray-50 rounded-md px-2">In stocks</span>
					@else
					<span class="bg-red-400 text-gray-50 rounded-md px-2">Out of stocks</span>
					@endif
			</div>
		</div>
			
	</div>
</div>