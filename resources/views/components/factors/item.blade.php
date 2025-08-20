@props(['caption', 'description', 'icon'])

<div>
    <div class="flex">
        @isset($caption)
            <h2 {{ $caption->attributes->class('flex-none text-lg text-max-text me-2.5 font-bold font-[Oswald]') }}>
                {{ $caption }}
            </h2>
        @endisset

        <div class="relative w-full mx-auto">
            <span class="border-b-2 absolute top-[50%] left-0 border-max-soft/60 border-dotted w-full"></span>
        </div>
        <div class="flex justify-center items-center flex-none border-2 rounded-full border-max-soft size-11 ms-2.5">
            <img src="{{ $icon }}" class="size-2/3 drop-shadow-lg" alt="">
        </div>
    </div>

    @isset($description)
        <div {{ $description->attributes->class('italic text-max-light') }}>
            {{ $description }}
        </div>
    @endisset
</div>
