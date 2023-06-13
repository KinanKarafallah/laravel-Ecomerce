<x-layout>
    <!-- component -->
<main class="flex items-center justify-center py-10">
    <section class="bg-white w-1/2 space-y-3 px-6 py-4 rounded-3xl shadow-lg border flex flex-col">
        @if ($order->status == 'paid')
        <div class="justify-center items-center flex">
            <svg width="98px" height="98px" viewBox="0 0 1024.00 1024.00" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="0.01024"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path fill="#35ed42" d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm-55.808 536.384-99.52-99.584a38.4 38.4 0 1 0-54.336 54.336l126.72 126.72a38.272 38.272 0 0 0 54.336 0l262.4-262.464a38.4 38.4 0 1 0-54.272-54.336L456.192 600.384z"></path></g></svg>      </div>
          <div class="flex justify-center items-center">
            <h3 class="font-bold text-2xl">Order: #{{$order->id}}</h3>
          </div>
        <ul class="flex space-x-2 justify-center items-center">
            <li class="bg-green-400 text-white text-md px-4 rounded-3xl">Paid</li>
        </ul>
        @endif

        @if ($order->status == 'unpaid')
        <div class="justify-center items-center flex">
          <svg width="98px" height="98px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="Warning / Info"> <path id="Vector" d="M12 11V16M12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12C21 16.9706 16.9706 21 12 21ZM12.0498 8V8.1L11.9502 8.1002V8H12.0498Z" stroke="#eda60c" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g></svg>
        </div>
          <div class="flex justify-center items-center">
            <h3 class="font-bold text-2xl">Order: #{{$order->id}}</h3>
          </div>
        <ul class="flex space-x-2 justify-center items-center">
            <li class="bg-amber-500 text-white text-md px-4 rounded-3xl">Unpaid</li>
        </ul>
        @endif

        @if ($order->status == 'failed')
        <div class="justify-center items-center flex">
          <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM15.36 14.3C15.65 14.59 15.65 15.07 15.36 15.36C15.21 15.51 15.02 15.58 14.83 15.58C14.64 15.58 14.45 15.51 14.3 15.36L12 13.06L9.7 15.36C9.55 15.51 9.36 15.58 9.17 15.58C8.98 15.58 8.79 15.51 8.64 15.36C8.35 15.07 8.35 14.59 8.64 14.3L10.94 12L8.64 9.7C8.35 9.41 8.35 8.93 8.64 8.64C8.93 8.35 9.41 8.35 9.7 8.64L12 10.94L14.3 8.64C14.59 8.35 15.07 8.35 15.36 8.64C15.65 8.93 15.65 9.41 15.36 9.7L13.06 12L15.36 14.3Z" fill="#ff0000"></path> </g></svg>   
        </div>
        <div class="flex justify-center items-center">
          <h3 class="font-bold text-2xl">Order: #{{$order->id}}</h3>
        </div>
        <ul class="flex space-x-2 justify-center items-center">
            <li class="bg-red-400 text-white text-md px-4 rounded-3xl">Failed</li>
        </ul>
        @endif
      <div class="text-gray-600 font-semibold justify-center flex items-center ">Total price :${{$order->total_price}}</div>
      <a href="/myorders" class="justify-center flex items-center pt-5" ><button class="bg-sky-800 text-white rounded-2xl px-5 py-3">See order list</button></a>
    </section>
  </main>

</x-layout>