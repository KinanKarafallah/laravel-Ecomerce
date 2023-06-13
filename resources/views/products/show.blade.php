<x-layout>
    <div class='flex items-center justify-center min-h-screen from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-2'>
        <div class='w-full max-w-md  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
              <div class='h-[236px]' style='background-image:url({{$product->image ? asset('uploads/products/' . $product->image) : asset('/images/reg.jpg')}});background-size:cover;background-position:center'>
               </div>
              <div class='p-4 sm:p-6'>
                <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$product->title}}</p>
                <div class='flex flex-row'>
                  <p class='text-[17px] font-bold text-[#0FB478]'>{{$product->price}} $</p>
                </div>
                <p class='text-[#7C7C80] font-[15px] mt-6'>{{$product->description}}.</p>
                <a href="#" class="mr-2 block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80">
                    <i class="material-icons-outlined text-base">shopping_cart</i>
                    <span>Add to cart</span>
                </a>
                <a  href="/" class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-[#F2ECE7] hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                      Back to home
                  </a>
              </div>
            </div>
        </div>
    </div>
</x-layout>