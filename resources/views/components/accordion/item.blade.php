@props(['index', 'image', 'title', 'description', 'active'])

<div class="relative overflow-hidden border-b border-max-dark/65 last:border-b-0">
    <button id="controlsAccordionItem-{{ $index }}" type="button"
        class="flex items-center justify-between w-full p-4 bg-max-dark/50 underline-offset-2"
        aria-controls="accordionItem-{{ $index }}" @click="selected = {{ $index }}"
        :class="selected === {{ $index }} ? 'font-bold bg-max-dark/70' : 'font-medium'"
        :aria-expanded="selected === {{ $index }} ? 'true' : 'false'">
        <div class="flex items-center justify-center rounded-full size-7 bg-max-dark/60">
            <div class="text-sm font-bold text-max-light font-[Oswald]">
                {{ $index }}
            </div>
        </div>
        <div class="me-auto ms-4 font-[Oswald] font-normal text-left tracking-wider text-white uppercase">
            {{ $title }}
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor"
            class="text-white transition size-5 shrink-0" aria-hidden="true"
            :class="selected === {{ $index }} ? 'rotate-180' : ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
        </svg>
    </button>

    <div x-cloak x-show="selected === {{ $index }}" id="accordionItem-{{ $index }}" role="region"
        aria-labelledby="controlsAccordionItem-{{ $index }}" x-collapse>
        <img data-src="{{ asset('images/' . $image) }}" class="object-cover size-full lazyload" alt="">

        <div class="absolute bottom-0 p-5 font-medium backdrop-blur-sm bg-max-dark/70">
            <div class="text-sm text-white">
                {{ $description }}
            </div>
        </div>
    </div>
</div>
