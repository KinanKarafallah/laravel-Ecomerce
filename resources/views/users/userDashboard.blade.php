<!DOCTYPE html>
<html lang="en" class="h-full" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
        <link
	        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
	         rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/tw-elements.min.css" />
        <title>E-Shop | Shop online & safe</title>
        @vite('resources/css/app.css')
    </head>
    <body class="min-h-screen bg-gray-100 mt-20">
        
        @include('components.nav-bar')
        <main class=""> 
            <x-flash-message />
            <div class="min-h-screen">
                <div class="mx-auto static max-w-7xl py-6 sm:px-6 lg:px-8" data-te-animation-init
                    data-te-animation-start="onScroll"
                    data-te-animation-on-scroll="repeat"
                    data-te-animation-reset="true"
                    data-te-animation="[fade-in_1s_ease-in-out]">
                
                    @include('components.landing')
                
                </div>
            </div>
            
        </main>
        <div class="bg-white min-h-sreen">
            <div class=" mx-auto static max-w-7xl py-6 sm:px-6 lg:px-8">
                @include('components.catagory')
            </div>
        </div>
        <div class="bg-gray-100 min-h-sreen">
            <h1 class="text-3xl xl:text-4xl font-bold leading-7 xl:leading-9 text-gray-700 mt-20 mb-10 justify-center flex">Shop for products</h1>

            <div class=" mx-auto static max-w-7xl py-6 sm:px-6 lg:px-8">
                @include('products.index')
            </div>
            <div class="flex justify-center mt-4 mb-5">
                @include('components.pagination')
            </div>
        </div>
        <div class="flex justify-center items-center bg-white min-h-screen">
            <h1 class="text-5xl font-bold leading-7 text-gray-700 my-10 flex-none ml-5">What people talk about us</h1>
            <div class="">
                @include('components.review')
            </div>
        </div>
        <div class=" bg-gray-100 min-h-screen">
            <div class="">
                @include('components.contact')
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    </body>
    @include('components.footer')
</html>