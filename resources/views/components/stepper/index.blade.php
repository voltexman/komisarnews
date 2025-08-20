@props(['header', 'caption', 'footer'])

<div {{ $attributes }} class="relative flex h-[600px] flex-col justify-between gap-y-5">

    <div class="flex flex-col gap-y-2.5">
        @isset($caption)
            <div class="text-center font-[Oswald] text-lg font-semibold uppercase text-max-dark">
                {{ $caption }}
            </div>
        @endisset
        @isset($header)
            <ul class="relative mx-auto flex w-full max-w-sm flex-row justify-between gap-x-2.5">
                {{ $header }}
            </ul>
        @endisset
    </div>

    <div class="mb-auto h-full">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="flex justify-between">
            {{ $footer }}
        </div>
    @endisset
</div>
