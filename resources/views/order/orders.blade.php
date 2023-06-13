<x-layout>
    <div class="bg-gray-50 min-h-screen flex items-center justify-center px-16">
        <div class="relative w-full max-w-lg">
          <div class="absolute top-0 -left-4 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob "></div>
          <div class="absolute top-0 -right-4 w-72 h-72 bg-yellow-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
          <div class="absolute -bottom-32 left-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
          <div class="m-8 relative space-y-4">
            <div class="space-x-2 space-y-2">
              <span class="flex mb-2">Filter by: </span>
              <a href="/myorders/?status=completed" class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full {{ request()->get('status') === 'completed' ?  'bg-transparent text-gray-800 ring-2 pointer-events-none' : 'bg-indigo-600 text-white hover:bg-indigo-800' }} duration-300 shadow-md font-semibold ">Completed</a>
              <a href="/myorders/?status=paid" class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full {{ request()->get('status') === 'paid' ?  'bg-transparent text-gray-800 ring-2 pointer-events-none' : 'bg-green-400 text-white hover:bg-green-800' }} transition-all duration-300 shadow-md font-semibold ">Paid</a>
              <a href="/myorders/?status=unpaid" class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full {{ request()->get('status') === 'unpaid' ?  'bg-transparent text-gray-800 ring-2 pointer-events-none' : 'bg-amber-500 text-white hover:bg-amber-700' }} transition-all duration-300 shadow-md font-semibold ">UnPaid</a>
              <a href="/myorders/?status=failed" class="text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full {{ request()->get('status') ==='failed' ?  'bg-transparent text-gray-800 ring-2 pointer-events-none' : 'bg-red-500 text-white hover:bg-red-800' }} transition-all duration-300 shadow-md font-semibold ">Failed</a>
            </div>
            @if(!count($orders)==0)
            @foreach ($orders as $order)
            <div class="p-5 bg-white opacity-70 rounded-lg flex items-center justify-between space-x-8 shadow-md">
              <div class="flex-1 flex justify-between items-center">
                <div class="">
                    <p class="justify-start items-center flex font-semibold">Order Number: #{{$order->id}}</p>
                    <span class="justify-start items-start flex font-thin pl-4">Total price: ${{$order->total_price}}</span>
                </div>
                <a href="/myorder/{{$order->id}}" class="justify-center items-center flex text-sm text-sky-600 transform transition duration-500 hover:scale-105">View order detail </a>
                <div class="flex text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full duration-300 shadow-md {{$order->status === "paid" ? 'bg-green-400' : ''}} {{$order->status === "unpaid" ? 'bg-amber-500' : ''}} {{$order->status === "failed" ? 'bg-red-500' : ''}}">
                 <span class="text-white">{{$order->status}}</span>
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
          <div class="flex items-center justify-center px-5 py-5 static">
            <div class="col-md-12 px-5">
                {{ $orders->appends(request()->input())->links('pagination::tailwind') }}
            </div>
        </div>
        </div>
      </div>
</x-layout>