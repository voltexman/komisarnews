@props(['label', 'image', 'name'])

<label
    class="group px-2.5 h-14 lg:h-auto flex cursor-pointer lg:flex-col lg:items-center lg:justify-center gap-2.5 lg:gap-1.5 rounded-lg border border-max-dark/5 lg:px-1.5 py-2.5 transition-colors duration-300 hover:bg-max-soft/30"
    :class="$wire.{{ $name }}.includes('{{ $label }}') ? 'bg-max-soft/30' : 'bg-max-soft/15'">

    <input type="checkbox" value="{{ $label }}" wire:model="{{ $name }}" class="peer hidden" />

    <img src="{{ $image }}" class="lg:size-2/3 drop-shadow-lg" alt="">

    <div class="flex gap-x-1.5 lg:mt-1.5 self-center">
        <span class="text-sm font-bold text-max-dark">{{ $label }}</span>
    </div>

    <div class="flex self-center size-5 ms-auto items-center justify-center rounded-full border border-max-dark/60 lg:hidden"
        :class="$wire.order.hair_options.includes('{{ $label }}') ? 'bg-max-dark/60' :
            'bg-max-light'">
        <x-lucide-check class="size-3 stroke-max-light"
            x-bind:class="{ 'hidden': !$wire.{{ $name }}.includes('{{ $label }}') }"
            stroke-width="2.5" />
    </div>
</label>
