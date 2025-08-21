@props(['variant' => 'default'])

@php
    $variants = [
        'default' => 'bg-max-light text-gray-900',
        'black' => 'bg-blue-600 text-white',
    ];

    $classes = $variants[$variant] ?? $variants['default'];
@endphp

<div {{ $attributes->merge(['class' => "relative rounded-xl shadow-md shadow-max-black/25 p-5 $classes"]) }}>
    {{ $slot }}
</div>
