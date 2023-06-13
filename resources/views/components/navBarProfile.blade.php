<div class=" relative inline-block text-left dropdown ml-5">
    <span class="rounded-md shadow-sm">
        <button class="flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 active:bg-gray-50 active:text-gray-800" 
                type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-118" data-dropdown-toggle="headlessui-menu-items-118" data-te-animation-init
                data-te-animation-target="#animate-click1">
            <span class="sr-only">Open user menu</span>
            <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
          </button>
      </span>
    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95" id="animate-click1"
        data-te-animation-init
        data-te-animation-start="onClick"
        data-te-animation-reset="true"
        data-te-animation="[fade-in-down_1s_ease-in-out]">
      <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-items-118" id="headlessui-menu-items-118" role="menu">
        <div class="px-4 py-3">         
          <p class="text-sm leading-5">Signed in as</p>
          <p class="text-sm font-medium leading-5 text-gray-900 truncate">{{ Auth::user()->email }}</p>
        </div>
        <div class="py-1">
          <a href="{{route('profile')}}" tabindex="0" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100"  role="menuitem" >Account settings</a>
          <a href="javascript:void(0)" tabindex="1" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100"  role="menuitem" >Support</a>
          <span role="menuitem" tabindex="-1" class="flex justify-between w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 cursor-not-allowed opacity-50 hover:bg-gray-100" aria-disabled="true">New feature (soon)</span>
          <a href="javascript:void(0)" tabindex="2" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100" role="menuitem" >License</a></div>
        <div class="py-1">
          <a href="/logout" tabindex="3" class="text-gray-700 flex justify-between w-full px-4 py-2 text-sm leading-5 text-left hover:bg-gray-100 "  role="menuitem" >Sign out</a></div>
      </div>
    </div>
</div>