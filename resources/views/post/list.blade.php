@extends('layouts.base')

@section('header')
    @parent
    <x-header :image="asset('images/article-header.webp')">
        <x-slot:title>Статті та новини</x-slot>
        <x-slot:caption>
            Дізнавайтесь більше про догляд за волоссям, тренди та поради експертів.
            <br>Актуальні статті для тих, хто цінує стиль, здоров’я і красу.
        </x-slot>
    </x-header>
@endsection

@section('content')
    <x-section>
        <livewire:post-list lazy />
    </x-section>
@endsection
