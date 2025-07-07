@extends('layouts.base')

@section('header')
    @parent
    <x-header :image="$post->getFirstMediaUrl('posts', 'header') ?: asset('images/article-header.webp')">
        <x-slot:title>{{ $post->name }}</x-slot>
    </x-header>
@endsection

@section('content')
    <article class="bg-max-light py-20">
        <div class="max-w-6xl mx-auto px-5 lg:px-0">
            <div class="flex flex-col md:flex-row gap-10 md:gap-20">
                <div class="flex flex-col gap-5 lg:sticky lg:top-24 self-start order-2 lg:order-1">
                    <div class="font-[Oswald] text-lg">Поділитись:</div>
                    <div class="flex md:flex-col gap-2.5 md:gap-5">
                        <div
                            class="size-14 flex justify-center items-center rounded-full border border-max-soft bg-max-dark/5 hover:bg-max-dark/10 hover:shadow-md transition-all duration-300 cursor-pointer">
                            <x-lucide-facebook class="size-6 stroke-max-dark" stroke-width="1.5" />
                        </div>
                        <div
                            class="size-14 flex justify-center items-center rounded-full border border-max-soft bg-max-dark/5 hover:bg-max-dark/10 hover:shadow-md transition-all duration-300 cursor-pointer">
                            <x-lucide-instagram class="size-6 stroke-max-dark" stroke-width="1.5" />
                        </div>
                    </div>
                </div>

                <div class="text-lg order-1 lg:order-2">{!! $post->body !!}</div>
            </div>

            @if ($post->category === App\Enums\PostCategories::ARTICLES)
                <div class="flex flex-row justify-between mt-5">
                    @if (!$post->tags->isEmpty())
                        <div>
                            @foreach ($post->tags as $tag)
                                <span class="text-sm font-medium uppercase me-3 text-max-dark">
                                    #{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </article>
@endsection
