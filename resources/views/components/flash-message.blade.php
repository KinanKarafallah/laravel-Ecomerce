@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show">
  <div role="alert" class="rounded-xl border border-gray-100 bg-white p-4 shadow-xl max-w-sm absolute mt-3 ml-5">
  <div class="flex items-start gap-4">
    <span class="text-green-600">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        />
      </svg>
    </span>

    <div class="flex-1">
      <strong class="block font-medium text-gray-900"> {{session('message')}}</strong>
    </div>
  </div>
</div>
</div>
@endif