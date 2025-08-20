@props(['open', 'header', 'body', 'footer'])

<div x-data="{ modalIsOpen: false }">

    <div @click="modalIsOpen = true">
        {{ $open }}
    </div>

    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
        @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 pb-8 bg-black/30 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true">

        <!-- Modal -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            {{ $attributes->class('modal') }}>

            <!--  Header -->
            @isset($header)
                <div {{ $header->attributes->class('modal-header') }}>
                    {{ $header }}
                    <button type="button" @click="modalIsOpen = false" aria-label="Закрити вікно">
                        <x-lucide-x class="size-5 text-max-light" />
                    </button>
                </div>
            @endisset

            <!-- Body -->
            <div {{ $body->attributes->class('modal-body') }}>
                {{ $body }}
            </div>

            <!-- Footer -->
            @isset($footer)
                <div {{ $footer->attributes->class('modal-footer') }}>
                    {{ $footer }}
                </div>
            @endisset
        </div>
    </div>
</div>
