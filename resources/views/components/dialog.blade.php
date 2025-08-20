@props(['open', 'icon', 'caption', 'body', 'actions', 'cancel' => true])

<div x-data="{ modalIsOpen: false }">

    <div @click="modalIsOpen = true">
        {{ $open }}
    </div>

    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
        @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 pb-8 bg-black/30 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true">

        <!-- Dialog -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            {{ $attributes->class('dialog') }}>

            <!--  Close button -->
            <button type="button" class="absolute right-3 top-3" @click="modalIsOpen = false"
                aria-label="Закрити вікно">
                <x-lucide-x class="size-5 text-max-black" />
            </button>

            <div class="dialog-body">{{ $slot }}</div>

            <!-- Actions -->
            <div {{ $actions->attributes->class('dialog-actions') }}>
                @if ($cancel)
                    <x-button class="flex" @click="modalIsOpen = false">
                        <x-lucide-ban class="inline-block size-4 me-2" />
                        Відмінити
                    </x-button>
                @endif
                {{ $actions }}
            </div>
        </div>
    </div>
</div>
