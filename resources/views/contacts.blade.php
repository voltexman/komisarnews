@extends('layouts.base')

@section('header')
    @parent
    <x-header :image="asset('images/contact-header.webp')">
        <x-slot:title>Контакти</x-slot>
        <x-slot:caption>Зв`язок з нами</x-slot>
    </x-header>
@endsection

@section('content')
    <x-section>
        <div class="flex flex-col gap-x-5 md:flex-row">
            <div class="grow">
                <div>
                    <div>Зв'яжіться з нами, надіславши листа.</div>
                    <div>Також, ми завжди на зв'язку в месенджерах <b>Viber</b> та <b>WhatsApp</b>.</div>
                    <div>Чекаємо на Ваші коментарі, зауваження чи побажанння.</div>
                </div>

                <div class="my-10 grid gap-5 lg:grid-cols-2">
                    <div class="flex">
                        <div class="rounded-full border border-max-soft bg-max-dark/5 p-5">
                            <x-lucide-map-pin class="size-6 stroke-max-dark/90" />
                        </div>
                        <div class="ms-5 flex flex-col self-center">
                            <span class="font-[Oswald] text-lg font-bold">Адреса</span>
                            <span>Україна, Київ</span>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="rounded-full border border-max-soft bg-max-dark/5 p-5">
                            <x-lucide-phone class="size-6 stroke-max-dark/90" />
                        </div>
                        <div class="ms-5 flex flex-col self-center">
                            <span class="font-[Oswald] text-lg font-bold">Телефон</span>
                            <span><a href="tel:+380737857777">+380 (73) 785-77-77</a></span>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="rounded-full border border-max-soft bg-max-dark/5 p-5">
                            <x-lucide-mail class="size-6 stroke-max-dark/90" />
                        </div>
                        <div class="ms-5 flex flex-col self-center">
                            <span class="font-[Oswald] text-lg font-bold">E-Mail</span>
                            <span>123komisar@gmail.com</span>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="rounded-full border border-max-soft bg-max-dark/5 p-5">
                            <x-lucide-user class="size-6 stroke-max-dark/90" />
                        </div>
                        <div class="ms-5 flex flex-col self-center">
                            <span class="font-[Oswald] text-lg font-bold">Контактна особа</span>
                            <span>Максим Комісар</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full max-w-md">
                <livewire:feedback />
            </div>
        </div>
    </x-section>
@endsection
