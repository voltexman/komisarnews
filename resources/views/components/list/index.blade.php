@props(['caption'])

<div {{ $attributes->class('') }}>
    @isset($caption)
        <div class="font-[Oswald] text-xl uppercase font-semibold mb-5">
            {{ $caption }}
        </div>
    @endisset

    <div>
        {{ $slot }}
    </div>
</div>
