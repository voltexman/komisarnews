@props(['variant' => 'soft', 'size' => 'default'])

<button
    {{ $attributes->class([
            'bg-max-light/80 text-max-dark lg:hover:bg-max-light' => $variant === 'light',
            'bg-max-soft/40 text-max-dark lg:hover:bg-max-soft/55' => $variant === 'soft',
            'bg-max-dark/40 text-max-dark lg:hover:bg-max-dark/55' => $variant === 'dark',
            'bg-max-orange text-max-light lg:hover:bg-max-orange/80' => $variant === 'orange',
            'bg-max-black text-max-light lg:hover:bg-black' => $variant === 'black',
            'bg-red/40 text-red lg:hover:bg-red/60' => $variant === 'danger',
            'flex justify-center items-center px-2.5 py-2.5 md:px-5 rounded-md font-semibold text-sm transition duration-300 cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed',
        ])->merge(['type' => 'button']) }}>
    {{ $slot }}
</button>
