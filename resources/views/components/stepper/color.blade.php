@props(['label', 'color'])

<label
    class="group flex flex-col items-center cursor-pointer border p-2.5 bg-max-soft/5 border-max-dark/5 rounded-lg has-[:checked]:bg-max-soft/30 hover:bg-max-soft/15 transition-colors duration-300">

    <!-- прихований radio input -->
    <input type="radio" wire:model="{{ $attributes->get('wire:model') }}" value="{{ $label }}" class="hidden" />

    <!-- кружок з кольором -->
    <div class="size-6 lg:size-10 rounded-full border-2 border-transparent group-hover:scale-110 transition-transform duration-300 has-[:checked]:border-max-dark flex justify-center items-center"
        style="background-color: #{{ $color }}">
        <x-lucide-check class="size-5 stroke-max-light opacity-0 peer-checked:opacity-100" stroke-width="2.5" />
    </div>

    <span
        class="hidden lg:block mt-1.5 text-center leading-3.5 font-semibold text-xs text-wrap text-max-dark">{{ $label }}</span>
</label>
