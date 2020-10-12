@php
    $classes = ($active ?? false)
                ? 'block text-white px-4 py-2 border-l-4 border-yellow-400'
                : 'block text-white hover:bg-gray-600 px-4 py-2';
@endphp

<a href="{{ $href }}" class="{{ $classes }}">
    {{ $slot }}
</a>
