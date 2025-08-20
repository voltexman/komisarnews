<div>
    @if ($posts->isEmpty())
        <div class="flex flex-col items-center">
            <x-lucide-frown class="size-14 opacity-80" />
            <span class="mt-3">
                Наразі, нажаль, статей немає...
            </span>
        </div>
    @else
        <div class="max-w-6xl mx-auto flex flex-col gap-y-16">
            @foreach ($posts as $post)
                <article
                    class="flex flex-col lg:flex-row gap-5 lg:gap-10 border-b border-max-orange/15 pb-16 last:border-b-0 last:pb-0">
                    <div class="flex-none max-w-12 flex flex-col gap-y-1.5">
                        <div class="text-xl font-semibold uppercase text-black/80 font-[Oswald]">
                            {{ $post->published_at->format('M') }}
                        </div>
                        <span class="h-0.5 bg-black/20"></span>
                        <div class="font-[Oswald] text-5xl font-bold text-black/65">
                            {{ $post->published_at->format('d') }}
                        </div>
                    </div>
                    <div class="md:w-1/2 flex-none">
                        <a href="{{ route('post.show', $post->slug) }}">
                            <img src="{{ $post->getFirstMediaUrl('posts', 'preview') }}" class="rounded-xl object-cover"
                                alt="{{ $post->name }}">
                        </a>
                    </div>
                    <div class="flex flex-col gap-y-5 grow">
                        <div class="flex items-center gap-x-1.5 -mb-5 ">
                            <x-lucide-tag class="size-3" />
                            <span class="text-sm font-semibold">tag one</span>
                        </div>
                        <div class="text-3xl font-[Oswald] line-clamp-2">
                            <a href="{{ route('post.show', $post->slug) }}">
                                {{ $post->name }}
                            </a>
                        </div>
                        <div class="font-medium">{{ \Illuminate\Support\Str::limit($post->body, 400) }}</div>
                        <a href="{{ route('post.show', $post->slug) }}">
                            <x-button variant="black" class="flex gap-x-1.5 me-auto">
                                <span class="">Детальніше</span>
                                <x-lucide-move-right class="size-5" />
                            </x-button>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        @if ($this->paginator->hasMorePages())
            <div class="flex justify-center mt-12 lg:mt-24">
                <x-button color='soft' wire:click="loadMore" wire:loading.attr="disabled">
                    Завантажити ще<x-lucide-refresh-cw class="size-5 inline-block ms-1.5"
                        wire:loading.class='animate-spin' />
                </x-button>
            </div>
        @else
            <div class="flex flex-col items-center px-10 mt-20">
                <img src="{{ asset('images/icons/smile.svg') }}" alt="">
                <p class="mt-3">Ви переглянули всі статті</p>
                <p class="p-0 -mt-2 leading-5 text-center">Завітайте згодом, щоб ознайомитись з новими публікаціями</p>
            </div>
        @endif
    @endif
</div>
