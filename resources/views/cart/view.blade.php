<x-layout>
  @push('scripts')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @endpush
  <x-flash-message />
    <div class="min-h-screen bg-gray-100 pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Cart Items</h1>
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
          <div class="rounded-lg md:w-2/3">
            
            @if(Cart::content()->count())
              @foreach(Cart::content() as $row)
                <div class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                  <img src="{{$row->options->has('image') ? asset('uploads/products/' . $row->options->image ) : asset('/images/reg.jpg')}}" alt="product-image" class="w-full rounded-lg sm:w-40" />
                  <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                    <div class="mt-5 sm:mt-0">
                      <h2 class="text-lg font-bold text-gray-900">{{$row->name}}</h2>
                      <p class="mt-1 text-xs text-gray-700">{{$row->options->has('description') ? $row->options->description : ''}}</p>
                    </div>
                    <div class="mt-4 flex justify-between sm:space-y-6 sm:mt-0 sm:block sm:space-x-6" x-data="{ count: {{$row->qty}} }">
                      <div class="flex items-center border-gray-100" >
                        <form method="POST" action="/mycart/updateQty/{{$row->rowId}}">
                          @csrf
                          <button x-on:click="count = count > 1 ? count-1 : count" data-action="decrement" class="cursor-pointer rounded-l bg-gray-100 py-1 px-3.5 duration-100 hover:bg-blue-500 hover:text-blue-50"> - </button>
                          <input x-model='count' class="h-8 w-8 border bg-white text-center text-xs outline-none" name="qty" type="number" min="1">
                          <button x-on:click="count++" data-action="increment" class="cursor-pointer rounded-r bg-gray-100 py-1 px-3 duration-100 hover:bg-blue-500 hover:text-blue-50"> + </button>
                        </form>
                      </div>
                      <div class="flex items-center space-x-4">
                        <p class="text-sm">${{$row->price}} </p>
                        
                        <div class="float-right mt-4 ">
                          <form method="POST" action="/item/{{$row->rowId}}">
                            @csrf
                            @method('DELETE')
                              <button class="text-gray-400 hover:text-red-600  ml-2" >
                                  <i class="material-icons-round text-base">delete_outline</i>
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              @else
              <div class="mt-5 sm:mt-0">
                <h2 class="text-lg font-bold text-gray-900">No product in your cart</h2>
              </div>
            @endif
          </div>
          <!-- Sub total -->
          <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
            <div class="mb-2 flex justify-between">
              <p class="text-gray-700">Subtotal</p>
              <p class="text-gray-700">${{Cart::subtotal()}}</p>
            </div>
            <div class="flex justify-between">
              <p class="text-gray-700">TAX</p>
              <p class="text-gray-700">${{Cart::tax()}}</p>
            </div>
            <hr class="my-4" />
            <div class="flex justify-between">
              <p class="text-lg font-bold">Total</p>
              <div class="">
                <p class="mb-1 text-lg font-bold">${{Cart::total()}} USD</p>
                <p class="text-sm text-gray-700">including VAT</p>
              </div>
            </div>
            <a href="/checkout">
            <button class="mt-6 w-full rounded-md bg-blue-500 py-1.5 font-medium text-blue-50 hover:bg-blue-600">Check out</button></a>
          </div>
        </div>
      </div>
</x-layout>

<style>
  input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  .custom-number-input input:focus {
    outline: none !important;
  }

  .custom-number-input button:focus {
    outline: none !important;
  }
</style>

