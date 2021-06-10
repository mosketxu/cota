<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    {{-- @livewire('navigation-menu') --}}

    <div class="p-2">
        <div class="max-w-full mx-auto">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}
                @livewire('ents')
            </div>
        </div>
    </div>
</x-app-layout>
