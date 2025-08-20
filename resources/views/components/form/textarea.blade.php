@props(['label', 'name', 'required' => false, 'color' => 'light'])

<div x-data="{ counter: false }" class="relative">
    <textarea id="hs-floating-{{ $attributes['name'] }}" wire:model='{{ $name }}'
        {{ $attributes->class([
            'bg-max-soft/20 border-max-soft/20 text-max-dark' => $color === 'light',
            'bg-max-light/90 border-max-soft/50 text-max-dark focus:bg-max-light/85' => $color === 'soft',
            'bg-max-dark/40 border-max-dark text-max-text focus:bg-max-light/10 focus:text-max-text' => $color === 'dark',
            'peer p-4 block w-full border-gray-200 rounded-lg text-sm placeholder:text-transparent focus:border-max-soft focus:ring-max-soft disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2',
        ]) }}
        placeholder="{{ $label }}" x-on:focus="counter = true" x-on:blur="counter = false" style="resize: none"></textarea>

    <label for="hs-floating-{{ $attributes['name'] }}"
        class="pointer-events-none absolute start-0 top-0 h-full truncate border border-transparent p-4 text-sm text-max-dark transition duration-100 ease-in-out peer-focus:-translate-y-1.5 peer-focus:text-xs peer-focus:text-max-soft peer-disabled:pointer-events-none peer-disabled:opacity-50 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-xs peer-[:not(:placeholder-shown)]:text-max-soft">
        {{ $label }}
    </label>

    <template x-if="'{{ $required }}'">
        <div class="absolute right-2 top-2 text-lg">
            <span class="bg-red-500 block h-1.5 w-1.5 rounded-full"></span>
        </div>
    </template>

    <template x-if="'{{ $attributes->has('maxlength') }}'">
        <div x-show="counter" x-transition.opacity.duration.300ms>
            <span
                x-bind:class="$wire.{{ $name }}.length !== {{ $attributes['maxlength'] }} ? 'bg-max-soft' : 'bg-red-500'"
                class="absolute -bottom-2 right-2 rounded px-1 text-xs text-max-light">
                <span x-text="$wire.{{ $name }}.length + '/' + {{ $attributes['maxlength'] }}"></span>
            </span>
        </div>
    </template>
</div>
