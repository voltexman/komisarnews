@props(['label', 'name', 'caption', 'required' => false])

<div x-data="{
    quantity: @entangle($name),
    min: {{ $attributes->get('min') }},
    max: {{ $attributes->get('max') }},
    validate() {
        if (this.quantity !== '' && this.quantity < this.min) this.quantity = this.min
        if (this.quantity !== '' && this.quantity > this.max) this.quantity = this.max
    }
}"
    {{ $attributes->class('relative py-1.5 px-2.5 bg-max-soft/15 border border-max-dark/5 rounded-lg flex flex-col items-center gap-0.5') }}>
    <div class="text-center line-clamp-1">
        <span class="text-sm text-max-dark font-bold">{{ $label }}</span>
        <span class="text-xs text-max-soft italic">{{ $caption }}</span>
    </div>

    @if ($required)
        <div class="absolute right-2 top-2 text-lg">
            <span class="block size-1.5 rounded-full bg-red-500"></span>
        </div>
    @endif

    <div class="flex items-center gap-1">
        <input type="number" x-model="quantity" placeholder="{{ $attributes->get('min') }}" @blur="validate"
            class="w-15 text-center text-max-dark font-semibold bg-transparent placeholder:text-max-soft focus:outline-none appearance-none no-spinner">
    </div>
</div>
