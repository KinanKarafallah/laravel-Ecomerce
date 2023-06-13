<nav class="bg-sky-50 fixed w-full z-20 top-0 left-0 border-b border-gray-200 backdrop-filter backdrop-blur-lg bg-opacity-30">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{route( 'home')}}" class="hover:bg-gray-700 text-black rounded-md px-3 py-2 text-sm font-medium {{ Route::currentRouteNamed( 'home' ) ?  'bg-sky-800 text-white' : '' }} ">Home</a>
                        @auth
                            <a href="{{route('product.manage')}}" class="text-black hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ Route::currentRouteNamed( 'product.manage' ) ?  'bg-sky-400 text-white' : '' }}">My Products</a>
                            <a href="{{route('orders.index')}}" class="text-black hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium {{ Route::currentRouteNamed( 'orders.index' ) ?  'bg-sky-400 text-white' : '' }}">My Orders</a>
                            <a href="#" class="text-black hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Reports</a>
                            @else
                            <a href="{{route('about')}}" class="text-black hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium active:bg-blue-500 {{ Route::currentRouteNamed( 'about' ) ?  'bg-sky-400 text-white' : '' }}">About Us</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                @auth  
                    <!-- Profile dropdown -->
                    
                    <div class="flex items-center justify-center p-12">
                        <div class=" relative pr-4 pt-1">
                            <x-notification :user="auth()->user()"/>
                        </div>
                        <a href="{{route('product.create')}}" class="rounded-md bg-gradient-to-br from-sky-600 to-blue-400 px-3 py-1.5 font-dm text-sm font-medium text-white shadow-md shadow-green-400/50 transition-transform duration-200 ease-in-out hover:scale-[1.03] {{ Route::currentRouteNamed('product.create') ?  'ring-offset-2 ring-emerald-400 ring-4' : '' }}"><i class="material-symbols-outlined mr-1 text-base">list_alt_add</i>Add Product</a>
                        <x-navBarProfile />
                        
                        <a href="/mycart" class="font-medium tracking-wide text-center ml-5">
                            <div class="relative scale-75">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-8 w-8 text-gray-600">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                                <span class="absolute -top-2 left-4 rounded-full bg-red-500 p-0.5 px-2 text-sm text-red-50">{{Gloudemans\Shoppingcart\Facades\Cart::content()->count()}}</span>
                            </div>
                        </a>
                    </div>   
                @endauth
                @guest                       
                    <a href="/register" class="text-gray-600 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"><i class="fa-solid fa-user-plus"></i> Register</a>
                    <a href="/login" class="text-gray-600 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                @endguest
            </div>
        </div>
    </div>
</nav>