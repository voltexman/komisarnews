@props(['label', 'name', 'required' => false, 'variant' => 'light'])

<div x-data="{ counter: false }" {{ $attributes->class('relative') }}>
    <textarea id="textarea-{{ $attributes['name'] }}" wire:model="{{ $name }}" @class([
        'bg-max-soft/15 border-max-soft/10 text-max-dark focus:bg-max-soft/20 focus:border-max-soft' =>
            $variant === 'light',
        'bg-max-dark/40 border-max-dark/60 text-max-text focus:bg-max-light/10 focus:border-max-soft' =>
            $variant === 'dark',
        'h-full peer border p-4 block w-full rounded-lg text-sm placeholder:text-transparent transition ease-in-out duration-300 focus:ring-max-soft disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2 outline-none',
    ])
        placeholder="{{ $label }}" x-on:focus="counter = true" x-on:blur="counter = false" style="resize: none"></textarea>

    <label for="textarea-{{ $attributes['name'] }}" @class([
        'text-max-dark peer-[:not(:placeholder-shown)]:text-max-dark peer-focus:text-max-dark' =>
            $variant === 'light',
        'text-max-text peer-[:not(:placeholder-shown)]:text-max-text peer-focus:text-max-text' =>
            $variant === 'dark',
        'input-label absolute top-0 start-0 p-4 h-full font-semibold sm:text-sm truncate pointer-events-none transition ease-in-out duration-300 border border-transparent origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:scale-90 peer-focus:translate-x-0.5 peer-focus:-translate-y-1.5 peer-focus:text-max-dark peer-not-placeholder-shown:scale-90 peer-not-placeholder-shown:translate-x-0.5 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-max-dark',
    ])>
        {{ $label }}
    </label>

    @if ($required)
        <div class="absolute right-2 top-2 text-lg">
            <span class="bg-red-500 block h-1.5 w-1.5 rounded-full"></span>
        </div>
    @endif

    @if ($attributes->has('maxlength'))
        <div x-show="counter" x-transition.opacity.duration.300ms>
            <span
                x-bind:class="(($wire.{{ $name }} ?? '').length !== {{ $attributes['maxlength'] }}) ?
                'bg-max-soft' :
                'bg-red-500'"
                class="absolute -bottom-2 right-2 rounded px-1 text-xs text-max-light">
                <span x-text="(($wire.{{ $name }} ?? '').length) + '/' + {{ $attributes['maxlength'] }}"></span>
            </span>
        </div>
    @endif
</div>
