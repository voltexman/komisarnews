@props(['link', 'active'])

@php
    $activeClass = $link === env('APP_URL') . '/articles' && request()->routeIs('article.show');
    $activeClass = $activeClass ? 'text-max-soft font-bold' : 'text-max-light';
@endphp

@if (!$active)
    <li @class([
        $activeClass,
        'mx-10 mb-3 text-sm transition lg:m-0 hover:text-max-soft',
    ])>
        <a class="flex items-center w-full p-3 font-semibold border rounded-lg ps-6 lg:p-0 lg:bg-transparent lg:border-0 gap-x-2 border-max-soft/30 bg-max-dark/30"
            href="{{ $link }}">
            {{ $slot }}
        </a>
    </li>
@endif
