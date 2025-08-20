<div class="mx-auto mb-5 space-y-5 lg:w-1/2">
    <div class="relative mx-4">
        <input type="text" wire:model.live.debounce.500ms='search'
            class="block w-full px-4 py-3 text-sm border rounded-lg text-max-text border-max-soft/30 bg-max-dark/30 peer ps-11 focus:border-max-dark focus:ring-max-dark placeholder:text-max-light/40"
            placeholder="пошук статей" aria-label="пошук статей за запитом">
        <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4">
            <x-lucide-search class="opacity-60 size-5 text-max-light" />
        </div>

        <span class="absolute text-xs font-light text-max-light/50 mt-0.5">
            <x-lucide-info class="inline-block size-3 me-0.5" />
            почніть вводити запит для пошуку
        </span>

        <div x-show="$wire.search.length" class="absolute inset-y-0 flex items-center end-4">
            <x-lucide-loader-circle class="hidden opacity-60 size-4 text-max-light animate-spin"
                wire:loading.remove.class='hidden' wire:targeta='search' />
            <button type="button" wire:loading.remove wire:target='search' @click="$wire.search = ''">
                <x-lucide-circle-x class="opacity-60 size-4 text-max-light" />
            </button>
        </div>
    </div>

    <div class="hidden" wire:loading.class.remove='hidden'>
        <div class="flex flex-col items-center pt-5">
            <x-lucide-search class="mb-2 text-max-light opacity-40 size-8" />
            <span class="text-xs text-max-light opacity-40">Триває пошук статей за запитом...</span>
        </div>
    </div>

    @if ($posts !== null && count($posts) > 0)
        <div class="w-full pt-4 font-medium text-center text-sm text-max-light/60">Знайдені статті...</div>
        <x-scrollbar class="max-h-[50vh] mx-4">
            @foreach ($posts as $post)
                <div class="flex flex-row" :key='{{ $post->id }}'>
                    <div class="me-3 h-[100px] w-[120px] lg:w-[160px] flex-none rounded-lg overflow-hidden">
                        <a href="{{ route('article.show', ['slug' => $post->slug]) }}">
                            <img src="{{ $post->getFirstMediaUrl('posts', 'preview') ?: asset('images/bg-header.webp') }}"
                                class="object-cover object-center h-full w-full" />
                        </a>
                    </div>
                    <div class="flex flex-col grow">
                        <a href="{{ route('article.show', ['slug' => $post->slug]) }}"
                            class="text-sm uppercase text-max-light line-clamp-1">
                            {{ $post->name }}
                        </a>
                        <p class="text-sm leading-5 text-max-light/50 line-clamp-4">
                            {{ Str::of($post->body)->stripTags() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </x-scrollbar>
    @else
        <div class="flex flex-col items-center pt-5" wire:loading.class='hidden' x-show='$wire.search.length'>
            <x-lucide-search-x class="mb-2 text-max-light opacity-40 size-8" />
            <span class="text-xs text-max-light opacity-40">По вашому запиту статей не знайдено.</span>
        </div>
    @endif
</div>
