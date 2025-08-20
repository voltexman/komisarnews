@props(['label', 'name' => '', 'required' => false, 'icon', 'color' => 'light', 'button'])

<div x-data="{ counter: false }">
    <div class="@isset($button) flex @endisset">
        <div class="relative grow">
            @isset($icon)
                <div
                    class="absolute inset-y-0 start-0 flex items-center ps-4 
            {{ $color === 'dark' ? 'text-max-text' : 'text-max-dark/80' }}">
                    @svg('lucide-' . $icon, 'shrink-0 size-5')
                </div>
            @endisset

            <input id="input-{{ Str::slug($label) }}" wire:model='{{ $name }}'
                {{ $attributes->class([
                        'pl-12' => isset($icon),
                        'border-e-0 rounded-e-none' => isset($button),
                        'bg-max-soft/15 border-max-soft/20 text-max-dark' => $color === 'light',
                        'bg-max-light/90 border-max-soft/80 focus:bg-max-light/85' => $color === 'soft',
                        'bg-max-dark/40 border-max-dark text-max-text focus:bg-max-light/10 focus:text-max-text' => $color === 'dark',
                        'peer border p-4 block w-full rounded-lg text-sm placeholder:text-transparent focus:border-max-soft focus:ring-max-soft disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 not-placeholder-shown:pt-6 not-placeholder-shown:pb-2 autofill:pt-6 autofill:pb-2 outline-none',
                    ])->merge(['type' => 'text']) }}
                placeholder="{{ $label }}" x-on:focus="counter = true" x-on:blur="counter = false">
            <label for="input-{{ Str::slug($label) }}" @class([
                'pl-12' => isset($icon),
                'text-max-dark peer-[:not(:placeholder-shown)]:text-max-dark peer-focus:text-max-dark' =>
                    $color === 'light',
                'text-max-text peer-[:not(:placeholder-shown)]:text-max-text peer-focus:text-max-text' =>
                    $color === 'dark',
                'input-label absolute top-0 start-0 p-4 h-full font-semibold sm:text-sm truncate pointer-events-none transition ease-in-out duration-250 border border-transparent origin-[0_0] peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:scale-90 peer-focus:translate-x-0.5 peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-not-placeholder-shown:scale-90 peer-not-placeholder-shown:translate-x-0.5 peer-not-placeholder-shown:-translate-y-1.5 peer-not-placeholder-shown:text-gray-500',
            ])>
                {{ $label }}
            </label>

            <template x-if="{{ $attributes->has('required') }}">
                <div class="absolute right-2 top-2 text-lg">
                    <span class="block size-1.5 rounded-full bg-red-500"></span>
                </div>
            </template>

            <template x-if="{{ $attributes->has('maxlength') }}">
                <div x-show="counter" x-transition.opacity.duration.300ms>
                    <span
                        x-bind:class="$wire.{{ $name }}.length !== {{ $attributes['maxlength'] }} ? 'bg-max-soft' :
                            'bg-red-500'"
                        class="absolute -bottom-2 right-2 rounded px-1 text-xs text-max-light">
                        <span x-text="$wire.{{ $name }}.length + '/' + {{ $attributes['maxlength'] }}"></span>
                    </span>
                </div>
            </template>
        </div>

        @isset($button)
            <button
                {{ $button->attributes->class('inline-flex flex-none items-center justify-center text-sm p-4 text-max-text rounded-e-lg border border-s-0 border-max-dark bg-max-dark/25 transition duration-300 active:bg-max-soft/50 lg:hover:bg-max-dark/70 disabled:opacity-50') }}>
                {{ $button }}
            </button>
        @endisset
    </div>

    @error($name)
        <x-error>{{ $message }}</x-error>
    @enderror
</div>
