@props(['variant' => 'dark'])

<button
    {{ $attributes->merge([
        'class' =>
            'inline-flex flex-none items-center justify-center text-sm p-4 text-max-text cursor-pointer rounded-e-lg border border-s-0 border-max-dark/60 bg-max-dark/25 transition duration-300 active:bg-max-soft/50 lg:hover:bg-max-dark/70 disabled:opacity-50',
    ]) }}>
    {{ $slot }}
</button>
