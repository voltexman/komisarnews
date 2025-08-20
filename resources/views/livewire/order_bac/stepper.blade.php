<x-stepper id="stepper" caption="Оцінка та продаж волосся" x-cloak>
    @session('number')
        <x-stepper.done title="Заявка успішно відправлена" description="Очікуйте відповіді майстра" :icon="asset('images/icons/order-check.svg')"
            :number="session('number')" />
    @else
        <form wire:submit="save" class="h-full">
            <x-slot:header>
                <x-stepper.navigation icon='file-text' label='Заявка' step='order.person' />
                <x-stepper.navigation icon='swatch-book' label='Опції' step='order.options' />
                <x-stepper.navigation icon='camera' label='Фото' step='order.photos' />
                <x-stepper.navigation icon='message-circle-more' label='Опис' step='order.description' />
                <x-stepper.navigation icon='file-check' label='Дані' step='order.check' />
            </x-slot>

            <div wire:show="current === 'person'" class="flex w-full flex-col gap-y-5">
                <ul
                    class="items-center w-full text-sm font-medium bg-max-soft/15 border border-max-soft/30 rounded-lg sm:flex overflow-hidden">
                    <div class="grid grid-cols-2">
                        <label class="cursor-pointer flex items-center gap-2.5">
                            <input type="radio" name="action" value="evaluation" class="hidden peer">
                            <div class="w-full px-5 py-2.5 transition peer-checked:bg-max-soft/20 hover:bg-max-soft/25">
                                <h3 class="text-lg font-bold text-max-dark">
                                    <x-lucide-gem class="inline-flex size-5" />
                                    <span>Оцінка</span>
                                </h3>
                                <p class="text-xs text-max-soft">Дізнайтесь вартість вашого волосся</p>
                            </div>
                        </label>

                        <label class="cursor-pointer flex items-center gap-2.5">
                            <input type="radio" name="action" value="sale" class="hidden peer">
                            <div class="w-full px-5 py-2.5 transition peer-checked:bg-max-soft/20 hover:bg-max-soft/25">
                                <h3 class="text-lg font-bold text-max-dark">
                                    <x-lucide-hand-coins class="inline-flex size-5" />
                                    <span>Продаж</span>
                                </h3>
                                <p class="text-xs text-max-soft">Швидко продайте волосся за вигідною ціною</p>
                            </div>
                        </label>
                    </div>

                    {{-- <li class="w-full border-b border-max-soft/20 sm:border-b-0 sm:border-r">
                        <div class="flex items-center p-5">
                            <x-radio id="purpose-evaluate" input-class="font-black" wire:model="$parent.order.purpose"
                                rounded="lg" label="Оцінка" value="lg" xl />
                        </div>
                    </li>
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                        <div class="flex items-center p-5">
                            <x-radio id="purpose-sell" wire:model="$parent.order.purpose" rounded="lg" label="Продаж"
                                value="lg" xl />
                        </div>
                    </li> --}}
                </ul>

                <x-form.input label="Ваше ім'я" icon="user" maxlength="40" name="order.name" />
                <x-form.input label="Місто" icon="map-pin" maxlength="30" name="$parent.order.city" required />
                <x-form.input label="Електронна пошта" icon="mail" maxlength="40" name="$parent.order.email" />
                <x-form.input label="Номер телефону" icon="phone" maxlength="19" name="$parent.order.phone"
                    x-mask="+380 (99) 999-99-99" required />
            </div>

            <div wire:show="current === 'options'" class="flex flex-col gap-y-5">
                <div>
                    <div class="flex justify-between gap-x-5">
                        <div class="rounded-lg border border-max-dark/10 bg-max-soft/15">
                            <div class="flex w-full items-center justify-between gap-x-1">
                                <div class="relative grow p-2.5">
                                    <div class="line-clamp-1 text-xs font-semibold text-max-dark">Вага (гр)</div>
                                    <input type="number" wire:model='$parent.order.hair_weight' placeholder="0"
                                        class="input-no-spinner w-full border-0 bg-transparent p-0 text-max-dark placeholder:text-sm placeholder:text-max-soft/50 focus:ring-0"
                                        aria-label="Вага">
                                </div>
                            </div>
                        </div>

                        <div class="rounded-lg border border-max-dark/10 bg-max-soft/15">
                            <div class="flex w-full items-center justify-between gap-x-1">
                                <div class="relative grow p-2.5">
                                    <div class="line-clamp-1 text-xs font-semibold text-max-dark">Довжина (см)</div>
                                    <div class="absolute right-2 top-2 text-lg">
                                        <span class="block h-1.5 w-1.5 rounded-full bg-red"></span>
                                    </div>
                                    <input type="number" wire:model.blur='$parent.order.hair_length' placeholder="0"
                                        class="input-no-spinner w-full border-0 bg-transparent p-0 text-max-dark placeholder:text-sm placeholder:text-max-soft/50 focus:ring-0"
                                        aria-label="Довжина">
                                </div>
                            </div>
                        </div>

                        <div class="w-[130px] rounded-lg border border-max-dark/10 bg-max-soft/15">
                            <div class="flex w-full items-center justify-between gap-x-1">
                                <div class="grow p-2.5">
                                    <div class="text-xs font-semibold text-max-dark">Вік</div>
                                    <input type="number" wire:model='$parent.order.age' placeholder="25"
                                        class="input-no-spinner w-full border-0 bg-transparent p-0 text-max-dark placeholder:text-sm placeholder:text-max-soft/50 focus:ring-0"
                                        aria-label="Вік">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="grid grid-cols-3 gap-x-5">
                        <!-- Зрізане -->
                        <label
                            class="group flex cursor-pointer flex-col items-center justify-center gap-y-1.5 rounded-lg border border-max-dark/10 p-1.5 transition-colors duration-300 hover:bg-max-soft/35"
                            :class="$wire.$parent.order.hair_options.includes('Зрізане') ? 'bg-max-soft/25' : 'bg-max-soft/15'">

                            <input type="checkbox" value="Зрізане" wire:model="$parent.order.hair_options"
                                class="peer hidden" />

                            <img src="{{ Vite::asset('resources/images/icons/woman-hair-cut.svg') }}"
                                class="size-2/3 opacity-95 drop-shadow-lg" alt="">

                            <div class="flex gap-x-1.5">
                                <span class="flex size-4 items-center justify-center rounded-full border border-max-dark"
                                    :class="$wire.$parent.order.hair_options.includes('Зрізане') ? 'bg-max-dark/80' :
                                        'bg-max-light'">
                                    <x-lucide-check class="size-3 stroke-max-light"
                                        x-bind:class="{ 'hidden': !$wire.$parent.order.hair_options.includes('Зрізане') }"
                                        stroke-width="2.5" />
                                </span>
                                <span class="text-sm font-bold">Зрізане</span>
                            </div>
                        </label>

                        <!-- Фарбоване -->
                        <label
                            class="group flex cursor-pointer flex-col items-center justify-center gap-y-1.5 rounded-lg border border-max-dark/10 p-1.5 transition-colors duration-300 hover:bg-max-soft/35"
                            :class="$wire.$parent.order.hair_options.includes('Фарбоване') ? 'bg-max-soft/25' : 'bg-max-soft/15'">

                            <input type="checkbox" value="Фарбоване" wire:model="$parent.order.hair_options"
                                class="peer hidden" />

                            <img src="{{ Vite::asset('resources/images/icons/brush-tool.svg') }}"
                                class="size-2/3 opacity-95 drop-shadow-lg" alt="">

                            <div class="flex gap-x-1.5">
                                <span class="flex size-4 items-center justify-center rounded-full border border-max-dark"
                                    :class="$wire.$parent.order.hair_options.includes('Фарбоване') ? 'bg-max-dark/80' :
                                        'bg-max-light'">
                                    <x-lucide-check class="size-3 stroke-max-light"
                                        x-bind:class="{ 'hidden': !$wire.$parent.order.hair_options.includes('Фарбоване') }"
                                        stroke-width="2.5" />
                                </span>
                                <span class="text-sm font-bold">Фарбоване</span>
                            </div>
                        </label>

                        <!-- З сивиною -->
                        <label x-data
                            class="group flex cursor-pointer flex-col items-center justify-center gap-y-1.5 rounded-lg border border-max-dark/10 p-1.5 transition-colors duration-300 hover:bg-max-soft/35"
                            :class="$wire.$parent.order.hair_options.includes('З сивиною') ? 'bg-max-soft/25' : 'bg-max-soft/15'">

                            <input type="checkbox" value="З сивиною" wire:model="$parent.order.hair_options"
                                class="peer hidden" />

                            <img src="{{ Vite::asset('resources/images/icons/female-hairs.svg') }}"
                                class="size-2/3 opacity-95 drop-shadow-lg" alt="">

                            <div class="flex gap-x-1.5">
                                <span class="flex size-4 items-center justify-center rounded-full border border-max-dark"
                                    :class="$wire.$parent.order.hair_options.includes('З сивиною') ? 'bg-max-dark/80' :
                                        'bg-max-light'">
                                    <x-lucide-check class="size-3 stroke-max-light"
                                        x-bind:class="{ 'hidden': !$wire.$parent.order.hair_options.includes('З сивиною') }"
                                        stroke-width="2.5" />
                                </span>
                                <span class="text-sm font-bold">З сивиною</span>
                            </div>
                        </label>
                    </div>
                </div>
            </div>

            <div wire:show="current === 'photos'" x-data="dropzone">
                @if ($this->isMaxPhotos())
                    <div
                        class="h-40 w-full overflow-hidden rounded-lg border border-dashed border-max-text/30 bg-max-text/10">
                        <div class="flex h-full content-center justify-center">
                            <div class="flex flex-col self-center px-8 lg:px-20">
                                <x-lucide-octagon-alert class="text-gray-500/90 mx-auto mb-4 size-10 opacity-50" />
                                <span class="text-gray-500/90 self-center text-xs">Ви додали максимальну кількість
                                    фото.</span>
                                <span class="text-gray-500/90 self-center text-center text-xs">
                                    Щоб додати або змінити фото, можете видалити
                                    <x-lucide-trash-2 class="-mt-0.5 inline-flex size-3" />
                                    будь-яке і відкрити інше.
                                </span>
                            </div>
                        </div>
                    </div>
                @else
                    <div :class="isDropping ? 'bg-max-text/60' : 'bg-max-text/20'"
                        class="relative h-40 w-full overflow-hidden rounded-lg border border-dashed border-max-text/90 duration-300">
                        <input wire:model="order.photos" type="file" multiple @drop="isDropping=false"
                            class="absolute inset-0 z-50 m-0 size-full cursor-pointer p-0 opacity-0 outline-none"
                            :class="'{{ $this->isMaxPhotos() ? 'hidden' : 'block' }}'" @dragover="isDropping=true"
                            @dragleave="isDropping=false">
                        <x-lucide-camera class="text-indigo-600 absolute -top-3 left-3 size-20 -rotate-25 opacity-5" />
                        <x-lucide-image class="text-red-600 absolute -right-2 top-1 size-16 rotate-35 opacity-5" />
                        <x-lucide-image-up
                            class="text-purple-600 absolute bottom-1 left-16 size-16 -rotate-55 opacity-5" />
                        <x-lucide-image-plus
                            class="text-cyan-600 absolute bottom-4 right-32 size-14 rotate-20 opacity-5" />
                        <x-lucide-file-image class="text-cyan-600 absolute left-36 top-4 size-16 rotate-10 opacity-5" />
                        <div class="flex h-full flex-row">
                            <div class="w-1/3 content-center">
                                <div class="relative mx-auto flex size-16">
                                    <span
                                        class="absolute inline-flex size-full animate-ping rounded-full bg-max-soft/50 opacity-75"></span>
                                    <span
                                        class="relative inline-flex size-16 rounded-full border-2 border-max-soft/70 bg-max-light">
                                        <x-lucide-cloud-upload
                                            class="mx-auto size-7 self-center text-max-soft opacity-90" />
                                    </span>
                                </div>
                            </div>
                            <div class="flex w-2/3 items-stretch">
                                <div class="flex flex-col self-center">
                                    <x-button class="flex items-center justify-center">
                                        <x-lucide-camera class="me-1 inline-flex size-5" />
                                        Відкрити<span class="hidden md:block">&nbsp;зображення</span>
                                    </x-button>
                                    <span class="text-sm text-max-dark/70">або перетягнути сюди...</span>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 flex w-full justify-between">
                            <span class="ms-2 text-xs text-max-black/60">
                                <x-lucide-file-image class="-mt-1 inline-flex size-3" />
                                JPG, PNG
                            </span>
                            <span class="me-2 text-xs text-max-black/60">
                                <x-lucide-scaling class="-mt-1 inline-flex size-3" />
                                1980x1024
                            </span>
                        </div>
                    </div>
                @endif

                <div x-show="isUploading" class="mt-3">
                    <div class="w-full overflow-hidden rounded-lg bg-max-soft/30">
                        <span class="block size-16 bg-max-soft/50"></span>
                    </div>

                    @php $items = ['','','','']; @endphp
                    <div class="mt-4 grid grid-cols-4 gap-x-4">
                        @foreach ($items as $item)
                            <div class="overflow-hidden rounded-lg bg-max-soft/30">
                                <div class="h-16"></div>
                                <div class="flex h-8 justify-between">
                                    <span class="flex w-full bg-max-dark/30"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-show='!isUploading'>
                    @if ($order->photos)
                        <x-alert class="mt-4">
                            На мініатюрах фотограції можуть виглядати інакше.
                            Але майстер бачитиме повноцінне фото. Модете додати ще 2 фото.
                        </x-alert>

                        <div class="mt-5 grid grid-cols-4 gap-x-5">
                            @foreach ($order->photos as $photo)
                                <livewire:order.photo :$photo :key="$photo->getRealPath()" :index="$loop->index" />
                            @endforeach
                        </div>
                    @else
                        <x-alert class="mt-5">
                            Намагайтесь обирати максимально вигідні фото та ракурс, який найкраще
                            відображає волосся та їх стан. Максимум до <b>4</b> фото.
                        </x-alert>
                        <x-alert warning class="mt-5">
                            <x-slot name="slot">
                                Не застосовуйте фільтрів, які змінюють кольори та якість фото. Не робіть
                                фото занадто малим, щоб майстер міг детальніше роздивитись волосся.
                            </x-slot>
                        </x-alert>
                    @endif
                </div>
            </div>

            {{-- <livewire:is :component="$current" :key="$current" /> --}}

            <x-slot:footer>
                <x-button wire:click="preview" wire:show="current !== 'order.person'" wire:loading.attr="disabled"
                    wire:target="preview" class="me-2.5">
                    <span>Назад</span>
                </x-button>

                <x-button wire:click="rulesShow = true" class="me-auto">
                    <x-lucide-info class="size-5" />
                </x-button>

                <x-button wire:show="current !== 'order.check'" wire:click="next" wire:loading.attr="disabled"
                    wire:target="next">
                    <span>Далі</span>
                </x-button>
                {{-- <div wire:loading wire:target='next'>
                        <span>Перевірка...</span>
                        <x-lucide-loader-2 class="ms-1 inline-block size-4 animate-spin" />
                    </div> --}}
                {{-- <div class="flex" wire:loading.remove wire:target='next'>
                        <span>Далі</span>
                        <x-lucide-arrow-right class="ms-2 inline-block size-5" />
                    </div> --}}

                <x-button type="submit" wire:show="current === 'order.check'" wire:click="save">
                    <span>Відправити</span>
                    <x-lucide-send class="ms-1.5 inline-block size-5" />
                </x-button>
            </x-slot>

            <div wire:show="rulesShow" class="absolute start-0 top-0 z-20 size-full rounded-lg bg-max-light p-5"
                x-transition.duration.500ms>
                <div class="flex h-full flex-col justify-between">
                    <div class="mb-5 text-center font-[Oswald] font-semibold uppercase">
                        Правила заявки
                    </div>
                    <x-lucide-x wire:click="rulesShow = false" class="absolute right-5 top-5 size-5 cursor-pointer" />
                    <div class="relative overflow-hidden">
                        <x-lucide-file-text
                            class="absolute left-1/2 top-1/2 z-0 size-[85%] -translate-x-1/2 -translate-y-1/2 rotate-35 opacity-5"
                            stroke-width="1.5" />
                        <x-scrollbar class="relative z-10 h-full overflow-hidden rounded-lg bg-max-dark/10 p-5">
                            <p class="text-balance text-sm font-semibold">
                                Перед надсиланням замовлення, будь ласка, уважно заповніть усі необхідні поля форми. Це
                                дозволить нам швидше обробити Ваш запит і надати точну інформацію щодо викупу волосся.
                            </p>
                            <ul class="text-sm font-semibold">
                                <span class="font-extrabold">Обов’язково вкажіть наступні дані:</span>
                                <li><x-lucide-check class="me-0.5 inline-flex size-3.5" /> Колір волосся</li>
                                <li>
                                    <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Вага <i class="opacity-85">(у грамах)</i>
                                </li>
                                <li>
                                    <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Довжина <i class="opacity-85">(у сантиметрах)</i>
                                </li>
                                <li><x-lucide-check class="me-0.5 inline-flex size-3.5" /> Ваше ім’я</li>
                                <li><x-lucide-check class="me-0.5 inline-flex size-3.5" /> Дійсна електронна адреса</li>
                                <li><x-lucide-check class="me-0.5 inline-flex size-3.5" /> Номер телефону для зворотного
                                    зв’язку</li>
                            </ul>
                            <p class="text-balance text-sm font-semibold">
                                Контактна інформація <i class="opacity-85">(електронна пошта та телефон)</i> необхідна нам
                                для того, щоб ми могли оперативно зв’язатися з Вами після отримання замовлення, уточнити
                                деталі та повідомити остаточну вартість волосся.
                            </p>
                            <ul class="text-sm font-semibold">
                                <span class="font-extrabold">Як відбувається обробка замовлення:</span>
                                <li><x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Після надсилання форми Ви отримаєте перше сповіщення про те, що наш фахівець
                                    ознайомлюється з Вашим запитом.
                                </li>

                                <li><x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Після розгляду замовлення, зазвичай протягом кількох годин, ми надішлемо Вам другий лист
                                    із детальною інформацією щодо вартості, умов викупу та подальших кроків.
                                </li>
                            </ul>
                            <ul class="text-sm font-semibold">
                                <span class="font-extrabold">Додаткова інформація:</span>
                                <p class="text-balance text-sm font-semibold">
                                    У полі "Ваше повідомлення" Ви можете зазначити будь-які додаткові відомості, які, на
                                    Вашу думку, можуть вплинути на оцінку волосся. Зокрема:
                                </p>
                                <li>
                                    <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Структуру волосся <i class="opacity-85">(пряме, хвилясте, кучеряве тощо)</i>
                                </li>
                                <li>
                                    <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Стан зрізу <i class="opacity-85">(наприклад: свіжа рівна стрижка, волосся зібране в
                                        шиньйон, укладене волосся тощо)</i>
                                </li>
                                <li>
                                    <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Чи було волосся пофарбоване, оброблене хімією, чи це натуральний колір
                                </li>
                                <li>
                                    <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                    Інформацію про догляд: як часто милось, чи використовувались засоби для укладки, чи
                                    сушилося феном тощо
                                </li>
                            </ul>
                            <p class="text-balance text-sm font-bold">
                                Всі деталі важливі. Чим повнішою буде інформація, тим точніше ми зможемо оцінити волосся і
                                запропонувати Вам вигідну ціну.
                            </p>
                            <hr class="h-px border-0 bg-black/10">
                            <p class="text-pretty text-xs font-semibold italic">
                                Дякуємо за довіру! Ми цінуємо кожного клієнта і прагнемо зробити процес співпраці
                                максимально зручним, прозорим і вигідним для Вас.
                            </p>
                        </x-scrollbar>
                    </div>

                    <div class="mt-5 rounded-lg bg-red/10 p-5 text-xs font-extrabold tracking-wider text-red/95">
                        Ми не надаємо ваші контактні дані іншим особам та не розсилаємо спам!
                        Не намагайтеся обдурити оцінювача, використовуючи прийоми, щоб поліпшити
                        якість волосся, або розтягувати пасмо, щоб візуально збільшити довжину. наш
                        фахівець обов'язково розпізнає обман.
                    </div>
                </div>
            </div>

            <div class="absolute start-0 top-0 size-full rounded-lg bg-white/80" wire:loading wire:target="save">
                <div class="flex h-full flex-col items-stretch justify-center text-max-soft" role="status">
                    <div class="self-center text-center">
                        <div class="border-current inline-block h-14 w-14 animate-spin rounded-full border-[3px] border-t-transparent text-max-soft"
                            role="status" aria-label="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsession
</x-stepper>

@script
    <script>
        Alpine.data('dropzone', () => ({
            isDropping: false,
            isUploading: false,
        }));
    </script>
@endscript
