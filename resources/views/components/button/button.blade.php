@props([
    'color',
])

<x-button
    class="text-white bg-{{ $color }}-700 active:bg-{{ $color }}-50 active:bg-{{ $color }}-800 hover:bg_{{ $color }}-500" {{ $attributes }}>
    {{ $slot }}
</x-button>


