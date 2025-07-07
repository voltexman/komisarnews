@props(['image', 'title', 'caption'])

<header class="relative h-[430px] w-full overflow-hidden">
    <img src="{{ $image }}" height="280" alt={{ env('APP_NAME') }} class="h-full object-cover object-center">
    <div class="absolute inset-0 bg-max-black/40 backdrop-blur-sm backdrop-brightness-75">
        <div class="size-full max-w-3xl mx-auto flex flex-col items-center justify-center px-5 lg:px-0">
            <h1 class="font-[Oswald] text-center text-3xl uppercase text-max-light">{{ $title }}</h1>

            @isset($caption)
                <div class="text-sm md:text-base md:font-medium text-center font-light uppercase text-max-light/80 mt-2.5">
                    {{ $caption }}
                </div>
            @endisset
        </div>
    </div>
</header>
