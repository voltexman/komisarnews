@extends('layouts.base')

@section('title', 'Головна сторінка')
@section('keywords', 'Головна сторінка')
@section('description', 'Головна сторінка')
@section('robots', 'all')

@section('header')
    @parent
    <div class="relative w-full h-screen py-24 overflow-hidden isolate sm:py-32">
        <div class="absolute top-0 left-0 w-full h-full bg-max-black/60"></div>
        <img data-src="{{ asset('images/bg-header.webp') }}" data-sizes="auto" alt="Komisarnews"
            class="absolute inset-0 object-cover object-right w-full h-full -z-10 md:object-center lazyload animate-ricochet lg:animate-none">
        <div class="px-6 mx-auto max-w-7xl lg:px-8">
            <div class="absolute w-full top-[50%] left-[50%] -translate-x-1/2 -translate-y-1/2 mx-auto lg:mx-0">
                <h1 class="text-2xl font-light text-center uppercase text-max-light lg:text-6xl"
                    x-intersect="$el.classList.add('slide-down')">
                    Продаж та покупка<br>волосся <span class="text-max-orange">у Києві.</span>
                </h1>
                <h2 class="mt-5 lg:mt-10 font-light text-xl lg:text-4xl text-center uppercase text-max-light/80"
                    x-intersect="$el.classList.add('slide-up')">
                    Купуємо дорого
                </h2>
            </div>
        </div>
        <div class="absolute flex -translate-x-1/2 bottom-8 left-1/2 ">
            <a href="#about" rel="nofollow" aria-label="Перейти до опису"
                class="z-40 flex size-12 border border-max-light/60 rounded-full animate-bounce bg-slate-50/20">
                <x-lucide-arrow-down class="self-center size-6 mx-auto text-slate-100" />
            </a>
        </div>
    </div>
@endsection

@section('content')
    <x-section class="bg-[#f2e9e1] scroll-mt-16" id="about">
        <x-slot:title>
            Шукаєте Кому Вигідно<br class="lg:hidden"> Продати Волосся?
        </x-slot>
        <x-slot:caption>
            Наша компанія завжди готова<br class="lg:hidden">
            <span class="text-max-orange">купити волосся дорого!</span>
        </x-slot>

        <div class="lg:grid lg:grid-cols-5 gap-x-16">
            <div class="col-span-2">
                <p>Жителі багатьох міст можуть <x-badge>продати волосся</x-badge> особисто <x-badge>нам в руки!</x-badge>
                    Подаруєте собі настрій, не бійтеся мінятися і удосконалюватися, продаючи свої коси, ви робите благу
                    справу і заробляєте додаткові гроші на потрібні покупки.</p>
                <img data-src="{{ Vite::asset('resources/images/about.jpg') }}"
                    class="object-cover w-full mt-8 mb-8 shadow-lg rounded-3xl h-36 lg:animate-none animate-slide-top-to-bottom shadow-max-black/30 lg:mb-0 lg:h-72 lazyload"
                    alt="">
            </div>
            <div class="col-span-3">
                <img data-src="{{ Vite::asset('resources/images/about-2.jpg') }}"
                    class="hidden object-cover w-full mb-8 shadow-lg rounded-3xl animate-slide-bottom-to-top h-72 lg:block shadow-max-black/30 lazyload"
                    alt="">
                <p>Звертайтеся за консультацією прямо зараз за нашими контактами. Ми завжди готові відповісти на будь-які
                    питання і запропонувати вам європейські ціни. Наша компанія завжди готова запропонувати
                    <x-badge>найвищу ціну</x-badge> за натуральний слов'янський зріз від 40 см, а також кращий
                    сервіс і обслуговування. Ми є професіоналами своєї справи і поважаємо кожного нашого клієнта, тому
                    гарантуємо максимум задоволення від співпраці.
                </p>
            </div>
        </div>
    </x-section>

    <x-section class="!bg-[#f2e9e1]/70">
        <div class="grid lg:py-10 lg:grid-cols-2 md:grid-cols-1 gap-y-10 lg:gap-x-10">
            <div>
                <h2 class="lg:text-4xl text-2xl mb-8 font-semibold text-center uppercase font-[Oswald] drop-shadow-lg">
                    Чому Варто Звернутися <br class="lg:hidden">Саме В Нашу Компанію?
                </h2>
                <p class="mt-14"><x-badge>Куплю</x-badge> волосся - в мережі можна знайти тисячі оголошень, але далеко не
                    всі продавці працюють <x-badge>чесно.</x-badge> Ми є Європейською компанією, яка співпрацює з клієнтами
                    по всьому світу. Наша компанія є прямим скупником локонів, тому пропонуємо <x-badge> найвищі ціни.
                    </x-badge> Цінуємо визнання і довіру наших клієнтів, <x-badge>гарантуємо</x-badge> приємну співпрацю і
                    гідну оплату Вашого товару. Здійснюємо скупку волосся по <x-badge>Україні</x-badge> і відбираємо якісні,
                    живі зрізи.</p>
                <p class="font-semibold">Після покупки, всі зрізи проходять обробку і надходять в подальший
                    продаж, а також використовуються у виробництві перук.</p>
            </div>
            <div class="lg:col-span2">
                <h3 class="mb-8 font-semibold text-center uppercase drop-shadow-lg text-lg font-[Oswald]">
                    Звертаючись в нашу компанію<br>з бажанням продати волосся,<br class="lg:hidden">
                    <span class="text-max-orange">ви гарантовано отримуєте</span>
                </h3>

                <x-about>
                    <x-about.item icon='user-round' index='1'>
                        <x-slot:title>Індивідуальність</x-slot>
                        <x-slot:description>Окремий та індивідуальний підхід для кожного нашого покупця</x-slot>
                    </x-about.item>
                    <x-about.item icon='handshake' index='2'>
                        <x-slot:title>Вигоду</x-slot>
                        <x-slot:description>Найвигідніші для Вас умови співпраці. Ми зацікавлені в цьому</x-slot>
                    </x-about.item>

                    <x-about.item icon='credit-card' index='3'>
                        <x-slot:title>Зручність</x-slot>
                        <x-slot:description>Обговорена грошова виплата в зручний для Вас час та спосіб</x-slot>
                    </x-about.item>
                    <x-about.item icon='gauge' index='4'>
                        <x-slot:title>Швидкість</x-slot>
                        <x-slot:description>Моментальна оплата після оцінки та відправки Вашої шевелюри</x-slot>
                    </x-about.item>
                    <x-about.item icon='badge-info' index='5'>
                        <x-slot:title>Інформативність</x-slot>
                        <x-slot:description>Відправляйте по вайберу фото волосся і спеціаліст оголосить ціну</x-slot>
                    </x-about.item>
                    <x-about.item icon='venetian-mask' index='6'>
                        <x-slot:title>Стиль</x-slot>
                        <x-slot:description>Ми запропонуємо Вам стильну та модну стрижку в подарунок</x-slot>
                    </x-about.item>
                </x-about>
            </div>
        </div>
    </x-section>

    <x-section class="relative lg:py-20 !bg-max-black">
        <div class="grid lg:grid-cols-2">
            <div class="hidden lg:flex gap-x-10">
                <img data-src="{{ Vite::asset('resources/images/postman.jpg') }}" alt="Відправка Новою поштою"
                    class="rounded-3xl shadow-lg w-[220px] object-cover relative -top-8 lazyload">
                <img data-src="{{ Vite::asset('resources/images/postman-2.jpg') }}" alt="Відправка Новою поштою"
                    class="rounded-3xl shadow-lg w-[220px] top-8 relative object-cover lazyload">
            </div>
            <div class="flex flex-col self-center">
                <h2 class="text-xl font-bold text-center uppercase text-max-light/80 lg:text-left font-[Oswald]">
                    Як відправити свій зріз?
                </h2>
                <h3 class="mt-1 text-sm font-bold text-center uppercase text-max-text lg:text-left font-[Oswald]">
                    Відправити свій зріз можна за<br class="lg:hidden">допомогою послуг Нової Пошти
                </h3>
                <p class="my-8 font-semibold text-max-light">При відправці ви вказуєте встановлену
                    нашим оцінювачем вартість, а при отриманні ми оплачуємо дану суму, плюс вартість
                    доставки. гроші ви зможете забрати в своєму відділенні нової пошти.</p>
                <x-list class="text-max-light">
                    <x-list.item class="font-light">
                        <x-lucide-check class="flex-none size-5 me-3" />
                        Насамперед ви повинні обумовити деталі з нашим менеджером.
                    </x-list.item>
                    <x-list.item class="font-light">
                        <x-lucide-check class="flex-none size-5 me-3" />
                        Кладемо біля волосся сантиметр і робимо фото, після чого зважуємо їх.
                    </x-list.item>
                    <x-list.item class="font-light">
                        <x-lucide-check class="flex-none size-5 me-3" />
                        Надсилаємо фотографію на наш Вайбер, а оцінювач встановлює точну вартість зрізу.
                    </x-list.item>
                    <x-list.item class="font-normal">
                        <x-lucide-check class="flex-none size-5 me-3" />
                        Коли локони надійно упаковані, їх можна відправляти поштою в нашу компанію.
                        </x-list.it>
                        <x-list.item class="font-normal">
                            <x-lucide-check class="flex-none size-5 me-3" />
                            Відправка волосся проводиться післяплатою, через послуги Нової Пошти.
                        </x-list.item>
                </x-list>
            </div>
        </div>
    </x-section>

    <x-section class="bg-max-light">
        <x-slot:title>Купівля волосся</x-slot>
        <x-slot:caption>
            ЯК ПРАВИЛЬНО ЗРОБИТИ ЗРІЗ<br class="lg:hidden"> ЩОБ
            <span class="text-max-orange">ВИРУЧИТИ МАКСИМАЛЬНУ ЦІНУ</span>
        </x-slot>

        <x-hair-sequence.desktop>
            <x-hair-sequence.desktop.item image='washing.jpg'>
                <x-slot:title>Миття волосся</x-slot>
                <x-slot:description>
                    Попередньо необхідно вимити волосся шампунем, яким Ви зазвичай користуєтесь.
                </x-slot>
            </x-hair-sequence.desktop.item>

            <x-hair-sequence.desktop.item image='drying.jpg'>
                <x-slot:title>Сушка волосся</x-slot>
                <x-slot:description>
                    Просушити волосся без використання фена, дайте локонам висохнути природним шляхом.
                </x-slot>
            </x-hair-sequence.desktop.item>

            <x-hair-sequence.desktop.item image='combing.jpg'>
                <x-slot:title>Розчісування волосся</x-slot>
                <x-slot:description>
                    Розчесати пасма, щоб позбутися ковтунів (якщо такі є), також, запобігти подальшому заплутування.
                </x-slot>
            </x-hair-sequence.desktop.item>

            <x-hair-sequence.desktop.item image='parting.jpg'>
                <x-slot:title>Поділ волосся</x-slot>
                <x-slot:description>
                    Розділити волосся на кілька пасів, обмотавши кілька разів, туго перетягнути кожну гумкою.
                </x-slot>
            </x-hair-sequence.desktop.item>

            <x-hair-sequence.desktop.item image='cutting.jpg'>
                <x-slot:title>Зріз волосся</x-slot>
                <x-slot:description>
                    Зробити зріз, відступивши кілька сантиметрів трохи вище кріплення та заплітаємо зрізане волосся в косу.
                </x-slot>
            </x-hair-sequence.desktop.item>

            <x-hair-sequence.desktop.item image='washing.jpg'>
                <x-slot:title>Оцінка волосся</x-slot>
                <x-slot:description>
                    Зважити зріз та сфотографувати біля сантиметра і надіслати дані для оцінювання.
                </x-slot>
            </x-hair-sequence.desktop.item>
        </x-hair-sequence.desktop>

        <x-accordion>
            <x-accordion.item image='washing.jpg' index='1'>
                <x-slot:title>Миття волосся</x-slot>
                <x-slot:description>
                    Попередньо необхідно вимити волосся шампунем, яким Ви зазвичай користуєтесь.
                </x-slot>
            </x-accordion.item>

            <x-accordion.item image='drying.jpg' index='2'>
                <x-slot:title>Сушка волосся</x-slot>
                <x-slot:description>
                    Просушити волосся без використання фена, дайте локонам висохнути природним шляхом.
                </x-slot>
            </x-accordion.item>

            <x-accordion.item image='combing.jpg' index='3'>
                <x-slot:title>Розчісування</x-slot>
                <x-slot:description>
                    Розчесати пасма, щоб позбутися ковтунів (якщо такі є), також, запобігти подальшому заплутування.
                </x-slot>
            </x-accordion.item>

            <x-accordion.item image='parting.jpg' index='4'>
                <x-slot:title>Поділ волосся</x-slot>
                <x-slot:description>
                    Розділити волосся на кілька пасів, обмотавши кілька разів, туго перетягнути кожну гумкою.
                </x-slot>
            </x-accordion.item>

            <x-accordion.item image='cutting.jpg' index='5'>
                <x-slot:title>Зріз волосся</x-slot>
                <x-slot:description>
                    Зробити зріз, відступивши кілька сантиметрів трохи вище кріплення та заплітаємо зрізане волосся в
                    косу.
                </x-slot>
            </x-accordion.item>

            <x-accordion.item image='washing.jpg' index='6'>
                <x-slot:title>Оцінка волосся</x-slot>
                <x-slot:description>
                    Зважити зріз та сфотографувати біля сантиметра і надіслати дані для оцінювання.
                </x-slot>
            </x-accordion.item>
        </x-accordion>

        {{-- Warning Info --}}
        <x-alert type="info" class="mt-5 lg:w-2/4 sm:w-2/3 sm:mx-auto lg:mx-0">
            Не намагайтесь обдурити оцінювача, використовуючи прийоми, щоб поліпшити
            якість волосся, або розтягувати пасмо, щоб візуально збільшити довжину.
            Наш фахівець обов'язково розпізнає обман.
        </x-alert>
    </x-section>

    <x-section class="!bg-[#f2e9e1]/70">
        <x-slot:title>ПРОДАТИ ВОЛОССЯ АБО<br class="lg:hidden"> ВСЕ Ж ЗБЕРЕГТИ ДОВЖИНУ?</x-slot>
        <x-slot:caption>
            МІНЯЙТЕСЯ І ЗАРОБЛЯЙТЕ<br class="lg:hidden">
            <span class="text-max-orange">НА НОВОМУ ОБРАЗІ ГРОШІ</span>
        </x-slot>

        <div class="grid mb-8 lg:grid-cols-2 gap-y-10 lg:gap-x-10 lg:mb-14">
            <div class="relative p-6 lg:p-10 bg-[#6a7265] rounded-xl">
                <span
                    class="bg-max-orange size-16 rounded-full absolute flex items-center justify-center -right-3 p-2 border-4 border-[#f2e9e1] -top-3">
                    <x-lucide-info class="text-max-light size-8" />
                </span>

                <div class="font-semibold text-max-light">
                    Якщо ви досі не вирішили, то завжди можете звернутися до нас з питаннями, що
                    цікавлять. Ми готові дати детальну інформацію про продаж та покупку і провести повну консультацію,
                    щоб кожен клієнт міг зробити для себе остаточні висновки. Наші контактні менеджери завжди на зв'язку
                    з клієнтами, що робить наш сервіс кращим.
                </div>
            </div>

            <div
                class="font-[Oswald] flex items-center text-xl lg:text-3xl font-normal uppercase drop-shadow-lg text-center">
                Вся продукція надходить в салони, для процедур нарощування,
                а також на виробництво перук, накладних кіс і шиньйонів.
            </div>
        </div>

        <div class="grid lg:mt-20 lg:grid-cols-2 gap-y-10 lg:gap-x-10">
            <div class="relative">
                <div class="absolute inset-0 z-0 bg-center bg-no-repeat bg-contain bg-barber opacity-15"></div>
                <div class="relative z-10">
                    <p>Гарна густа шевелюра – це справжнє багатство будь-якої жінки.
                        Стильна зачіска завжди прикрашає образ, робить його більш ніжним, акуратним, жіночним і
                        природним.</p>
                    <p>Але така краса, забирає не тільки грошові вкладення, але й багато часу, сил і терпіння.
                        Тривалі укладання, дорогий догляд, ерез це, в сучасному світі, де кожна хвилина
                        на рахунку, іноді просто немає можливості цим займатись. Якщо ви зважилися щось
                        змінити, змінити образ, надати йому родзинку і відчути небувалу <x-badge>легкість</x-badge>, то
                        пропонуємо вам
                        продати волосся. Якщо ви думаєте про продаж волосся але ніяк не зважитеся, то уявіть, скільки
                        <x-badge>вільного часу</x-badge> у вас з'явиться. Ви зможете присвятити цінні години улюбленій
                        справі, приділити
                        увагу близьким, а не витрачати час на укладання. <x-badge>Свіжий образ</x-badge> надихне вас на нові
                        справи,
                        подарує впевненість, а компліменти на вашу адресу будуть сипатися звідусіль. Змінюючи себе, свій
                        образ і стиль, ви можете заробити хороші гроші в свій сімейний бюджет! Ще ніколи зміна образу не
                        була такою <x-badge>прибутковою</x-badge>. Пам'ятайте, що ваші локони можуть принести радість іншим
                        людям, які в
                        силу різних причин не мають можливості відростити красиву довжину.
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-x-5 lg:gap-x-10">
                <div class="relative overflow-hidden shadow-lg rounded-3xl shadow-max-dark/40">
                    <div class="absolute inset-0 z-30 flex items-center justify-center">
                        <div
                            class="text-3xl lg:text-5xl tracking-widest drop-shadow-md font-light text-max-light [writing-mode:vertical-lr] uppercase">
                            Стильно
                        </div>
                    </div>
                    <img data-src="{{ Vite::asset('resources/images/stilno.jpg') }}"
                        class="object-cover w-full animate-scale-in h-80 lg:h-full lazyload" alt="">
                </div>
                <div class="relative overflow-hidden shadow-lg rounded-3xl shadow-max-dark/40 w-auto h-[110%] -top-[5%]">
                    <div class="absolute inset-0 z-30 flex items-center justify-center">
                        <div
                            class="text-3xl lg:text-5xl tracking-widest drop-shadow-lg font-light text-max-light [writing-mode:vertical-lr] uppercase">
                            Модно
                        </div>
                    </div>
                    <img data-src="{{ Vite::asset('resources/images/modno.jpg') }}"
                        class="object-cover animate-scale-out size-full lazyload" alt="">
                </div>
                <div class="relative overflow-hidden shadow-lg rounded-3xl shadow-max-dark/40">
                    <div class="absolute inset-0 z-30 flex items-center justify-center">
                        <div
                            class="text-3xl lg:text-5xl tracking-widest drop-shadow-lg font-light text-max-light [writing-mode:vertical-lr] uppercase">
                            Молодіжно
                        </div>
                    </div>
                    <img data-src="{{ Vite::asset('resources/images/molodezhno.jpg') }}"
                        class="object-cover animate-scale-in size-full lazyload" alt="">
                </div>
            </div>
        </div>
    </x-section>

    <x-section class="bg-max-light">
        <div class="grid gap-14 lg:grid-cols-2">
            <x-list class="mb-3">
                <x-slot:caption>
                    Що потрібно знати, перш ніж зважитися на продаж волосся?
                </x-slot>

                <x-list.item class="py-3">
                    <x-lucide-check-check class="flex-none size-6 me-3 text-max-black" />
                    Купівля волосся нашою компанією здійснюється тільки після їх оцінки.
                </x-list.item>
                <x-list.item class="py-3">
                    <x-lucide-check-check class="flex-none size-6 me-3 text-max-black" />
                    Вартість формується індивідуально в кожному випадку.
                </x-list.item>
                <x-list.item class="py-3">
                    <x-lucide-check-check class="flex-none size-6 me-3 text-max-black" />
                    Щоб озвучити точну ціну нам необхідно побачити фотографію зрізу біля сантиметра і знати точну вагу.
                </x-list.item>
                <x-list.item class="py-3">
                    <x-lucide-check-check class="flex-none size-6 me-3 text-max-black" />
                    Купуємо жіночі, чоловічі та дитячі коси від 40 сантиметрів, в будь-яких відтінках.
                </x-list.item>
                <x-list.item class="py-3">
                    <x-lucide-check-check class="flex-none size-6 me-3 text-max-black" />
                    Найвищу ціну готові запропонувати за шовковисті, м'які зрізи, без сивини, що не піддавалися
                    фарбуванню, а також хімічній завивці.
                </x-list.item>
            </x-list>

            <div class="relative p-6 lg:p-10 bg-max-orange rounded-xl">
                <span
                    class="bg-[#6a7265] size-16 rounded-full absolute flex items-center justify-center -right-3 p-2 border-4 border-[#f2e9e1] -top-3">
                    <x-lucide-info class="text-max-light size-8" />
                </span>
                <div class="font-[Oswald] text-max-light text-xl mb-5">
                    Ми гарантуємо чесну оцінку, без заниження ціни.
                </div>
                <div class="font-medium text-max-light">Натуральне слов'янське волосся - це дуже цінний товар, який не може
                    коштувати мало. Ми готові запропонувати дійсно високі ціни, так як цінуємо Вашу працю та час, витрачений
                    на догляд за такою шевелюрою. Щоб збільшити вартість, можна попередньо підготувати волосся. Пропийте
                    курс вітамінів, використовуйте натуральні масла, пийте більше рідини, стежте за кінчиками волосся,
                    постійно оновлюючи їх і позбавляючись від посічених кінців. Нас цікавлять живі, здорові, блискучі
                    пасма.</div>
            </div>
        </div>
    </x-section>

    <x-section class="!bg-max-black">

        <x-slot:title class="text-max-light">Покупка волосся</x-slot>
        <x-slot:caption class="text-max-text">
            Які чинники <span class="text-max-orange">впливають на вартість</span>
        </x-slot>

        <x-factors>
            <x-factors.item percent="22">
                <x-slot:caption>Довжина зрізу</x-slot>
                <x-slot:description>
                    Ми купуємо зрізи від 40 сантиметрів. Якщо ваші локони коротші, то рекомендуємо ненадовго відкласти
                    продаж, кожен сантиметр здатний сильно відбитися на вартості.
                </x-slot>
            </x-factors.item>

            <x-factors.item percent="19">
                <x-slot:caption>Структура локонів</x-slot>
                <x-slot:description>
                    Вища вартість пропонується за якісні, здорові та рівномірні
                    локони. М'які і природньо гладкі на дотик пасма, завжди мають значно вищу ціну.
                </x-slot>
            </x-factors.item>

            <x-factors.item percent="24">
                <x-slot:caption>Стан пучка</x-slot>
                <x-slot:description>
                    Зріз має бути зроблений за правилами та закріплений зверху
                    гумкою і не мати колунів. Краще продавати свіжозрізані коси, їх ціна вища. Пролежані
                    прядки втрачають свій природний блиск та натуральні масла, які містяться в них.
                </x-slot>
            </x-factors.item>

            <x-factors.item percent="16">
                <x-slot:caption>Хімічний вплив</x-slot>
                <x-slot:description>
                    Ми не приймаємо пошкодженні, ламкі та сухі локони, або локони
                    з неоднорідною структурою. А також волосся із завивкою, забруднене або оброблене будь якими
                    хімічними речовинами.
                </x-slot>
            </x-factors.item>

            <x-factors.item percent="32">
                <x-slot:caption>Колір волосся</x-slot>
                <x-slot:description>
                    Пофарбовані пасма будуть коштувати набагато дешевше натуральних.
                    Скупка волосся здійснюється будь-якому кольорі, але більш висока ціна встановлюється на світлі
                    натуральні тони.
                </x-slot>
            </x-factors.item>

            <x-factors.item percent="28">
                <x-slot:caption>Наявність сивини</x-slot>
                <x-slot:description>
                    Зрізи з сивиною теж підлягають купівлі, але багато залежить
                    від доглянутості волосся та як довго росло з сивиною. Забарвлене і сиве волосся приймається від
                    50 сантиметрів.
                </x-slot>
            </x-factors.item>
        </x-factors>

        <x-alert type="info" class="mt-10 lg:w-1/3">
            <div class="font-thin text-max-white/80">Відсоткове відношення впливу на ціну є відносним та орієнтовним.
                В деяких випадках відсотки можуть змінюватись та інші фактори можуть переважати.</div>
        </x-alert>
    </x-section>
@endsection
