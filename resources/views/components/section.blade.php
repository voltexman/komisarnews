@props(['title', 'caption'])

<section {{ $attributes->class('bg-max-light py-14 lg:py-20') }}>
    @isset($title)
        <h2
            {{ $title->attributes->class('text-2xl drop-shadow-lg text-center font-semibold uppercase font-[Oswald] text-max-black') }}>
            {{ $title }}
        </h2>
    @endisset

    @isset($caption)
        <h3
            {{ $caption->attributes->class('mt-2 mb-8 text-sm font-semibold text-center uppercase drop-shadow-lg font-[Oswald] tracking-wide') }}>
            {{ $caption }}
        </h3>
    @endisset

    <div class="mx-auto max-w-6xl px-5 lg:px-0">
        {{ $slot }}
    </div>
</section>
