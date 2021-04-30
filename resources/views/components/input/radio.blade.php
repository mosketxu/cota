<!-- component -->
 @props([
    'color'=>'gray',
])

<div class="flex flex-col">
    <label class="inline-flex items-center mt-3">
        <input type="radio" class="w-5 h-5 text-{{ $color }}-600 form-radio">
            <span class="ml-2 text-gray-700">
                {{ $slot }}
            </span>
    </label>
</div>

