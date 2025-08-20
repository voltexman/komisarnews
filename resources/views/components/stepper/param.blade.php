@props(['label', 'name', 'caption'])

<div x-data="{ quantity: 1 }" {{ $attributes->class('py-2 px-3 bg-max-soft/15 border border-max-dark/5 rounded-lg') }}>
    <div class="w-full flex justify-between items-center gap-x-5">
        <div class="grow">
            <div class="text-center line-clamp-1">
                <span class="text-sm text-max-dark font-bold">{{ $label }}</span>
                <span class="text-xs text-max-soft italic">{{ $caption }}</span>
            </div>
            <input type="number" x-model="quantity" min="1" wire:model="{{ $name }}"
                class="w-full p-0 text-center bg-transparent border-0 text-max-soft font-semibold focus:ring-0 focus:border-0 focus:outline-none 
                    [&::-webkit-inner-spin-button]:appearance-none 
                    [&::-webkit-outer-spin-button]:appearance-none"
                style="-moz-appearance: textfield;" aria-roledescription="Number field">
        </div>
    </div>
</div>
