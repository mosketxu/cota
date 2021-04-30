@props(['disabled' => false,'selectname'])

<select name= {{$selectname}} {{$attributes->merge(['class'=>"py-1 text-xs border-gray-300 rounded-md shadow-sm text-gray-600 bg-white hover:border-gray-400 focus:outline-none appearance-none"]) }}>
    {{ $slot }}
</select>

