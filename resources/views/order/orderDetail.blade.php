<x-layout>
    <div class="bg-gray-50 min-h-screen flex items-center justify-center px-16">
        <div class="relative w-full max-w-lg">
          <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
          <div class="absolute top-0 -right-4 w-72 h-72 bg-red-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
          <div class="absolute -bottom-32 left-20 w-72 h-72 bg-sky-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
          <div class="m-8 relative space-y-4">
            <div class="p-5 bg-white opacity-70 rounded-lg flex items-center justify-between space-x-8 shadow-md scale-110">
              <div class="flex-1 flex justify-between items-center">
                <div class="">
                    <h3 class="justify-start items-center flex font-bold text-xl">Order Number: #{{$order->id}}</h3>
                </div>
                <div class="flex text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full duration-300 shadow-md {{$order->status === "paid" ? 'bg-green-400' : ''}} {{$order->status === "unpaid" ? 'bg-amber-500' : ''}} {{$order->status === "failed" ? 'bg-red-500' : ''}}">
                  <span class="text-white">{{$order->status}}</span>
                </div>
              </div>
            </div>
            @if(!count($orderProducts)==0)
            @foreach($productsDetail as $productDetail)
            <div class="p-5 bg-white opacity-70 rounded-lg flex items-center justify-between space-x-8 shadow-md transform transition duration-500 hover:scale-105">
              <div class="flex-1 flex justify-between items-center">
                <img class=" max-h-10 max-w-fit" src="{{$productDetail->image ? asset('uploads/products/' . $productDetail->image) : asset('/images/reg.jpg')}}" />
                <div class="">
                    <p class="justify-start items-center flex font-semibold">Product Name: {{$productDetail->title}}</p>
                    <span class="justify-start items-start flex font-thin pl-4">Product Descriptions: {{$productDetail->description}}</span>
                    <span class="justify-start items-start flex font-thin pl-4">Product price: ${{$productDetail->price}}</span>
                    <span class="justify-start items-start flex font-thin pl-4">Qty: {{$orderProducts->where('product_id',$productDetail->id)->value('quantity')}}</span>
                </div>
              </div>
            </div>
            
            @endforeach
            @else
            <div class="p-5 bg-white rounded-lg opacity-70 flex items-center justify-between space-x-8 shadow-lg">
              <div class="flex-1 flex justify-between items-center">
                <div class="">
                    <span class="justify-start items-start flex font-semibold pl-4">Sorry, Thier is no Order to display.</span>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
</x-layout>