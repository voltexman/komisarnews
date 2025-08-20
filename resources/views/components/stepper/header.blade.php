@props(['caption', 'navigation'])

<div class="space-y-5">
    @if ($caption)
        <div class="text-center font-[Oswald] text-lg font-semibold uppercase text-max-dark">
            {{ $caption }}
        </div>
    @endif

    @if ($navigation)
        <ul class="relative mx-auto flex max-w-sm flex-row justify-between gap-x-2.5">
            {{ $navigation }}
        </ul>
    @endif
</div>
