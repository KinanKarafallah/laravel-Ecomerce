@props(['user'])
<div class=" relative inline-block text-left dropdown ml-5">
    <button type="button" aria-haspopup="true" aria-expanded="true" aria-controls="headlessui-menu-items-117" data-dropdown-toggle="headlessui-menu-items-117" class="inline-flex items-center text-sm font-medium text-center text-gray-600 hover:text-gray-900 focus:outline-sky-300 focus:ring-2 rounded-full" type="button" 
        data-te-animation-init
        data-te-animation-target="#animate-click"> 
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"></path></svg>
            @if(!count($user->unreadNotifications)==0)
            <span class=" absolute right-0 top-0 flex h-3 w-3">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-3 w-3 bg-sky-500"></span>
            </span>
            @else
            @endif
        
    </button>
    <!-- Dropdown menu -->
    <div class="opacity-0 invisible dropdown-menu transition-all duration-300 transform origin-top-right -translate-y-2 scale-95" id="animate-click"
        data-te-animation-init
        data-te-animation-start="onClick"
        data-te-animation-reset="true"
        data-te-animation="[fade-in-down_1s_ease-in-out]">
        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none" aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
            @forelse ($user->unreadNotifications as $notify)
            <div class="px-4 py-3">         
                <p class="text-sm leading-5">{{$notify->data['message']}} <a class=" text-xs underline text-sky-500 hover:text-sky-700" href="{{ url('ReadNotification') }}/{{ $notify->id }}"  data-id="{{$notify->id}}" >Mark as read</a>
                </p>
                <p class="text-sm font-medium leading-5 text-gray-900 truncate"></p>

            </div>
            @empty
                <div class="px-4 py-3"> 
                    <p class="text-sm leading-5">No notification here</p>
                </div>
            @endforelse
        </div>
    </div>
</div>