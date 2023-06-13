<x-layout>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @endpush
    <!-- component -->
<body class="font-mono bg-gray-400">
    <!-- Container -->
    <div class="container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <!-- Row -->
            <div class="w-full xl:w-3/4 lg:w-11/12 flex">
                <!-- Col -->
                <div
                    class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                    style="background-image: url('https://source.unsplash.com/Mv9hjnEUHR4/600x800')"
                 ></div>
                <!-- Col -->
                <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Edit your product!</h3>
                    <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="/products/{{$product->id}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <div class="md:space-y-2 mb-3">
                                <label class="text-xs font-semibold text-gray-600 py-2">Product Image</label>
                                <div class="flex items-center py-6">
                                    <div class="w-24 h-24 mr-4 flex-none rounded-xl border overflow-hidden">
                                        <img class="w-24 h-24 mr-4 object-cover" src="{{$product->image ? asset('uploads/products/' . $product->image) : asset('/images/reg.jpg')}}" alt="Avatar Upload">
                                     </div>
                                    <label class="cursor-pointer ">
                                        <span class="focus:outline-none text-white text-sm py-2 px-4 rounded-full bg-green-400 hover:bg-green-500 hover:shadow-lg">Browse</span>
                                        <input type="file" class="hidden" name="image" :multiple="multiple" :accept="accept">
                                    </label>
                                    @error('image')
                                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                    @enderror
                                    </div>
                                </div>
                            <label class="block text-xs font-semibold text-gray-600 py-2" for="title">
                                Title
                            </label>
                            <input
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-black focus:shadow-outline"
                                id="title"
                                name="title"
                                type="text"
                                placeholder="Tilte"
                                value="{{$product->title}}"
                            />
                            @error('title')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4 pt-6">
                            {{-- <div class="mb-8">
                                <label class="block text-xs font-semibold text-gray-600 py-2"  for="file-input" >Choose Image</label>
                                <input type="file" name="image" id="file-input" class="block w-full border border-gray-200 shadow-sm rounded-md text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 hover:file:cursor-pointer hover:cursor-pointer
                                    file:bg-transparent file:border-0
                                    file:bg-gray-100 file:mr-4
                                    file:py-3 file:px-4
                                    dark:file:bg-gray-700 dark:file:text-gray-400">
                                @error('image')
                                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div> --}}

                            <div  x-data="{value: '{{$product->status}}', offValue: '0', onValue:'1'}">
                                <div class="flex items-center m-2 cursor-pointer cm-toggle-wrapper"  x-on:click="value =  (value == onValue ? offValue : onValue);">
                                    <span class="text-xs font-semibold text-gray-600 py-2 mr-1">
                                        Out of stock
                                    </span>
                                    <div class="rounded-full w-8 h-4 p-0.5 bg-gray-300" :class="{'bg-red-500': value == offValue,'bg-green-500': value == onValue}">
                                        <div class="rounded-full w-3 h-3 bg-white transform mx-auto duration-300 ease-in-out" :class="{'-translate-x-2': value == offValue,'translate-x-2': value == onValue}"></div>
                                    </div>
                                    <span class="text-xs font-semibold text-gray-600 py-2 ml-1">
                                        In stock
                                    </span>
                                    <input class="sr-only" name="status" x-model='value'>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2 text-xs font-semibold text-gray-600 py-2" for="price">
                                Price
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-black focus:shadow-outline"
                                id="price"
                                type="number"
                                name="price"
                                placeholder="100 $"
                                step=".01"
                                value="{{$product->price}}"
                            />
                            @error('price')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-xs font-semibold text-gray-600 py-2" for="description">
                                Description
                            </label>
                            <textarea
                                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-black focus:shadow-outline"
                                id="description"
                                name="description"
                                placeholder="Description"
                                >
                                {{$product->description}}
                            </textarea>
                            @error('description')
                              <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-6 text-center">
                            <button
                                class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
                                type="submit"
                            >
                                Update 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</x-layout>
<style>
    /* CHECKBOX TOGGLE SWITCH */
    .toggle-checkbox:checked {
      @apply: right-0 border-green-400;
      right: 0;
      border-color: #68D391;
    }
    .toggle-checkbox:checked + .toggle-label {
      @apply: bg-green-400;
      background-color: #68D391;
    }
</style>