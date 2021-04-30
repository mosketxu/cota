@props(['color'=>'green'])

<div class="flex items-center justify-center px-2 py-1 m-1 font-medium text-{{ $color }}-700 bg-white bg-{{ $color }}-100 border border-{{ $color }}-300 rounded-md ">
    <div slot="avatar">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 mx-2 feather feather-check-circle">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
            <polyline points="22 4 12 14.01 9 11.01"></polyline>
        </svg>
    </div>
    <div class="flex-initial max-w-full text-xl font-normal">
        {{ $slot }}
    </div>
</div>
