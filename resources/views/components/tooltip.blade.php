@props(['variant' => 'dark', 'position' => 'top', 'arrow' => true])

<div class="relative">
    <button type="button"
        class="cursor-pointer peer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"
        aria-describedby="tooltip">
        <x-lucide-circle-help class="size-4 text-max-light/80 hover:text-max-light" />
    </button>
    <div id="tooltip" @class([
        'bg-max-black text-max-light' => $variant === 'dark',
        'bg-max-light text-max-black' => $variant === 'light',
        'pointer-events-none absolute bottom-full mb-2.5 left-1/2 -translate-x-1/2 z-10 flex w-64 rounded-md p-2.5 opacity-0 duration-500 transition-all ease-out peer-hover:opacity-100 peer-focus:opacity-100',
    ]) role="tooltip">
        <div class="text-xs font-medium">{{ $slot }}</div>
    </div>
</div>
