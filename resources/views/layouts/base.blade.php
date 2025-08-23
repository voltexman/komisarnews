<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, shrink-to-fit=no">
    <meta name="google-site-verification" content="P_5zyoITcuRC83ELC_TcPLOmRi_NKcdcH4Sct9jORGg" />

    {{-- // TODO: Додати favicon для всіх можливих варіантів --}}
    <link rel="icon" type="image/png" href="favicon.png">

    <!-- Allow web app to be run in full-screen mode - iOS. -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Allow web app to be run in full-screen mode - Android. -->
    <meta name="mobile-web-app-capable" content="yes">
    <!-- Make the app title different than the page title - iOS. -->
    <meta name="apple-mobile-web-app-title" content="KomisarNews">
    <!-- Configure the status bar - iOS. -->
    <meta name="apple-mobile-web-app-status-bar-style" content="brown">
    <!-- Disable automatic phone number detection. -->
    <meta name="format-detection" content="telephone=no">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ loading: true }">

    <div x-show="loading" @load.window="loading=false" x-transition.opacity.duration.500ms
        class="fixed left-0 top-0 z-100 flex h-screen w-screen justify-center bg-black">
        <div class="border-current inline-block h-20 w-20 animate-spin self-center rounded-full border-[6px] border-t-transparent text-max-soft"
            role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <div x-data="scrollProgress" x-show="isVisible" x-transition.opacity.duration.500ms x-cloak
        class="fixed bottom-4 right-4 z-40 grid h-12 w-12 items-center rounded-full bg-max-soft/50 shadow-md shadow-max-dark/20"
        :style="{ background: `conic-gradient(rgb(92, 75, 56, .7) ${percent}% , rgb(145, 118, 90, .4) ${percent}%)` }">
        <a href="#" rel="nofollow">
            <span class="z-50 mx-auto flex h-10 w-10 items-center justify-center rounded-full bg-max-soft">
                <x-lucide-arrow-up class="h-4 w-4 text-center text-max-light" />
            </span>
        </a>
    </div>

    <header>
        @section('header')
            <nav x-data="navbar" x-init="scrolled"
                class="container fixed z-50 w-full duration-500 lg:left-1/2 lg:top-3 lg:-translate-x-1/2 lg:rounded-xl"
                x-bind:class="(isScrolled || navIsOpen || searchIsOpen) &&
                'bg-max-black/90 backdrop-blur-sm shadow-lg shadow-max-black/40'"
                @scroll.window="scrolled" x-cloak>
                <div class="relative flex h-16 items-center justify-between px-5">

                    {{-- Logo --}}
                    <div class="flex shrink-0 items-center">
                        <a href="{{ route('main') }}" class="text-lg font-normal uppercase text-max-light">
                            komisar<span class="rounded bg-max-orange px-1 text-white">news</span>
                        </a>
                    </div>

                    {{-- Desktop Menu --}}
                    <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="hidden w-full sm:ml-6 lg:block">
                            <div class="flex space-x-4">
                                <x-menu>
                                    <x-menu.item :link="route('main')" :active="request()->routeIs('main')">
                                        Головна
                                    </x-menu.item>
                                    <x-menu.item :link="route('post.list')" :active="request()->routeIs('post.list')">
                                        Статті
                                    </x-menu.item>
                                    <x-menu.item :link="route('contacts')" :active="request()->routeIs('contacts')">
                                        Контакти
                                    </x-menu.item>
                                </x-menu>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center p-2">
                        <button type="button" class="h-9 text-white" aria-label="Пошук статей" @click="searchToggle">
                            <x-lucide-search class="size-5" x-show="!searchIsOpen" />
                            <x-lucide-x class="size-5" x-show="searchIsOpen" />
                        </button>
                    </div>

                    {{-- Scroll to Map Button --}}
                    <div class="inset-y-0 right-0 mx-2 flex items-center sm:static sm:inset-auto">
                        <div class="order-1 ms-auto flex items-center lg:ms-0">
                            <a href="#map" aria-label="Обрати місто">
                                <x-button class="flex items-center uppercase" variant="orange">
                                    <x-lucide-map-pin class="me-1 size-4 flex-none" />
                                    <span class="hidden lg:block">Обрати місто</span>
                                    <span class="block lg:hidden">Міста</span>
                                </x-button>
                            </a>
                        </div>
                    </div>

                    {{-- Mobile Show Menu Button --}}
                    <div class="inset-y-0 right-0 flex items-center lg:hidden">
                        <!-- Mobile menu button-->
                        <button type="button"
                            class="relative -me-2 inline-flex items-center justify-center rounded-md p-2 text-max-light"
                            aria-controls="mobile-menu" aria-expanded="false" @click="navToggle">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <x-lucide-menu class="size-6" x-show="!navIsOpen" />
                            <x-lucide-x class="size-6" x-show="navIsOpen" />
                        </button>
                    </div>
                </div>

                <!-- Mobile menu, show/hide based on menu state. -->
                <div id="mobile-menu" x-show="navIsOpen" x-collapse class="lg:hidden">
                    <div class="space-y-1 px-2 pb-3 pt-2">
                        <x-menu>
                            <x-menu.item :link="route('main')" :active="request()->routeIs('main')">Головна</x-menu.item>
                            <x-menu.item :link="route('post.list')" :active="request()->routeIs('post.list')">Статті</x-menu.item>
                            <x-menu.item :link="route('contacts')" :active="request()->routeIs('contacts')">Контакти</x-menu.item>
                        </x-menu>
                    </div>
                </div>
                <div x-show="searchIsOpen" x-collapse>
                    <div class="space-y-1 px-2 pb-3 pt-2">
                        <livewire:search />
                    </div>
                </div>
            </nav>
        @show
    </header>

    <main>
        @yield('content')

        <x-section id="map" class="scroll-mt-16 !bg-max-dark py-10">
            <x-slot:title class="text-max-light">
                Купівля і продаж<br class="lg:hidden"> волосся в містах
            </x-slot>
            <x-slot:caption class="text-max-light">
                Оберіть ваше місто<br class="lg:hidden"> або <span class="text-max-orange">зробіть заявку</span>
            </x-slot>

            <div class="flex flex-col lg:flex-row">
                <div class="w-full self-center lg:me-10 lg:w-3/4">
                    @include('layouts.partials.map')
                </div>

                <div class="mb-4 mt-14 sm:px-28 lg:mb-0 lg:mt-0 lg:w-1/4 lg:min-w-[480px] lg:px-0">
                    <livewire:order />
                </div>
            </div>
        </x-section>
    </main>

    <x-section class="border-b-8 border-max-light/10 !bg-max-black px-0 py-14 sm:px-28 lg:px-0">
        <div class="flex flex-col gap-y-10 lg:flex-row lg:justify-between lg:gap-8 lg:gap-y-0">
            <div class="order-2 w-full lg:order-1 lg:w-2/3">
                <livewire:subscriber />
            </div>
            <div class="order-1 w-full lg:order-2 lg:w-1/3">
                <livewire:callback />
            </div>
        </div>
    </x-section>

    <footer class="bg-max-black">
        <div class="max-w-6xl mx-auto py-20">
            <div class="grid lg:grid-cols-3 lg:justifybetween">
                <div class="font-semibold text-max-light/60">
                    <div class="flex flex-row justify-center lg:justify-start">
                        <x-lucide-map-pin class="me-1 mt-0.5 size-4" />
                        <span>Україна, Київ</span>
                    </div>
                    <div class="flex flex-row justify-center lg:justify-start">
                        <x-lucide-user-2 class="me-1 mt-0.5 size-4" />
                        <span>Максим Комісар</span>
                    </div>
                </div>

                <div class="mt-5 text-center lg:mt-0">
                    <div class="text-2xl font-extrabold text-max-text">+380 (73) 785-77-77</div>
                    <div class="font-semibold text-max-light/60">123komisar@gmail.com</div>
                </div>

                <div class="mt-10 flex justify-center lg:justify-end gap-3 self-center text-max-soft lg:mt-0">
                    <a href="https://www.facebook.com/profile.php?id=100081276925197" aria-label="Ми в Facebook"
                        target="_blank">
                        <x-lucide-facebook class="size-8" />
                    </a>
                    <a href="https://instagram.com/sale_hair_kyiv?igshid=OGQ5ZDc2ODk2ZA==" aria-label="Ми в Instagram"
                        target="_blank">
                        <x-lucide-instagram class="size-8" />
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-max-light/[.07] py-5 text-center text-xs text-max-light/50">
            {{ date('Y') }} © KomisarNews. Всі права застережено.
        </div>
    </footer>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('navbar', () => ({
                navIsOpen: false,
                searchIsOpen: false,
                isScrolled: false,
                navToggle() {
                    this.navIsOpen = !this.navIsOpen;
                    this.searchIsOpen = false;
                },
                searchToggle() {
                    this.searchIsOpen = !this.searchIsOpen;
                    this.navIsOpen = false;
                },
                scrolled() {
                    this.isScrolled = window.pageYOffset >= 200 ? true : false;
                }
            }));

            Alpine.data('scrollProgress', () => ({
                circumference: 30 * 2 * Math.PI,
                percent: 0,
                isVisible: false,
                init() {
                    this.isVisible = window.pageYOffset >= 500 ? true : false;
                    window.addEventListener('scroll', () => {
                        let winScroll = document.body.scrollTop || document.documentElement
                            .scrollTop
                        let height = document.documentElement.scrollHeight - document
                            .documentElement.clientHeight
                        this.percent = Math.round((winScroll / height) * 100)

                        this.isVisible = window.pageYOffset >= 500 ? true : false;
                    });
                }
            }));
        });
    </script>
</body>

</html>
