@session('order-number')
    <x-card class="flex flex-col items-center justify-center h-[600px]" x-cloak>
        <x-lucide-check-circle-2 class="mx-auto mb-5 size-32 stroke-max-dark" stroke-width="1" />
        <div class="font-semibold text-lg text-max-dark">Заявка відправлена</div>
        <div class="text-max-dark">Скоро з вами зв’яжемось</div>
        <div class="mt-5 text-xl text-max-dark font-bold drop-shadow-lg">ID: {{ session('order-number') }}</div>
        <x-button type="button" color='light' class="mt-5" wire:click='$refresh' wire:target.except='save'
            wire:loading.attr='disabled'>Нова заявка
            <x-lucide-rotate-ccw class="ms-1.5 inline-block size-4" wire:loading.remove />
            <x-lucide-refresh-cw class="ms-1.5 inline-block size-4 animate-spin" wire:loading />
        </x-button>
    </x-card>
@else
    <x-card x-cloak>
        <x-stepper caption="Оцінка та продаж волосся">
            <form wire:submit="save" class="h-full">
                <x-slot:header>
                    <x-stepper.navigation icon='file-text' label='Заявка' step="person" :active="$this->isCurrent('person')"
                        :checked="$this->isChecked('person')" />
                    <x-stepper.navigation icon='swatch-book' label='Опції' step="options" :active="$this->isCurrent('options')"
                        :checked="$this->isChecked('options')" />
                    {{-- <x-stepper.navigation icon='camera' label='Фото' step='order.photos' /> --}}
                    <x-stepper.navigation icon='message-circle-more' label='Опис' step="description" :active="$this->isCurrent('description')"
                        :checked="$this->isChecked('check')" :checked="$this->isChecked('description')" />
                    <x-stepper.navigation icon='file-check' label='Дані' step="check" :active="$this->isCurrent('check')"
                        :checked="$this->isChecked('check')" />
                </x-slot>

                <div wire:show="current === 'person'" class="flex flex-col gap-y-5 w-full">
                    <div
                        class="flex sm:flex-row items-center text-sm font-medium bg-max-soft/15 border border-max-soft/30 rounded-lg">
                        <div class="grid lg:grid-cols-2">
                            <x-stepper.purpose label="Оцінка" description="Дізнатись вартість вашого волосся"
                                wire:model="order.purpose" />
                            <x-stepper.purpose label="Продаж" description="Продати волосся за вигідною ціною"
                                wire:model="order.purpose" />
                        </div>
                    </div>

                    <x-form.input label="Ваше ім'я" icon="user" maxlength="40" name="order.name" />
                    <x-form.input label="Місто" icon="map-pin" maxlength="30" name="order.city" required />
                    <x-form.input label="Електронна пошта" icon="mail" maxlength="40" name="order.email" />
                    <x-form.input label="Номер телефону" icon="phone" maxlength="19" name="order.phone"
                        x-mask="+380 (99) 999-99-99" required />
                </div>

                <div wire:show="current === 'options'" class="flex flex-col gap-y-5">
                    <div class="grid grid-cols-6 gap-1.5 lg:gap-2.5">
                        <div class="col-span-full font-bold text-sm text-max-dark">Колір волосся</div>
                        <x-stepper.color label="Блонд" wire:model="order.color" color="F9E4B7" />
                        <x-stepper.color label="Світло-русий" wire:model="order.color" color="D9B382" />
                        <x-stepper.color label="Русий" wire:model="order.color" color="A67856" />
                        <x-stepper.color label="Сівтло-коричн." wire:model="order.color" color="8B5E3C" />
                        <x-stepper.color label="Темно-коричн." wire:model="order.color" color="4B2E1E" />
                        <x-stepper.color label="Чорний" wire:model="order.color" color="1B1B1B" />
                    </div>

                    <div class="grid grid-cols-3 gap-2.5 lg:gap-5">
                        <x-stepper.param label="Вага" caption="(гр.)" name="order.hair_weight" />
                        <x-stepper.param label="Довжина" caption="(мм.)" name="order.hair_length" />
                        <x-stepper.param label="Вік" caption="(р.)" name="order.age" />
                    </div>

                    <x-form.hint>
                        Заповніть параметри товару та оберіть доступні опції. Це дозволить точно
                        розрахувати ціну.
                    </x-form.hint>

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-2.5 lg:gap-5">
                        <x-stepper.option label="Зрізане" :image="Vite::asset('resources/images/icons/woman-hair-cut.svg')" name="order.hair_options" />
                        <x-stepper.option label="Фарбоване" :image="Vite::asset('resources/images/icons/brush-tool.svg')" name="order.hair_options" />
                        <x-stepper.option label="З сивиною" :image="Vite::asset('resources/images/icons/female-hairs.svg')" name="order.hair_options" />
                    </div>
                </div>

                {{-- <div wire:show="current === 'photos'" x-data="dropzone">
                @if ($this->isMaxPhotos())
                    <div
                        class="h-40 w-full overflow-hidden rounded-lg border border-dashed border-max-text/30 bg-max-text/10">
                        <div class="flex h-full content-center justify-center">
                            <div class="flex flex-col self-center px-8 lg:px-20">
                                <x-lucide-octagon-alert class="text-gray-500/90 mx-auto mb-4 size-10 opacity-50" />
                                <span class="text-gray-500/90 self-center text-xs">
                                    Ви додали максимальну кількість фото.
                                </span>
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
                        <x-lucide-file-image
                            class="text-cyan-600 absolute left-36 top-4 size-16 rotate-10 opacity-5" />
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
            </div> --}}

                <div wire:show="current === 'description'" class="flex flex-col gap-y-5 h-full">
                    <x-alert type="info">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam rerum ad eum delectus sapiente
                        adipisci
                        eveniet facere autem.
                    </x-alert>

                    <x-form.textarea label="Додатковий опис" name="order.description"
                        class="h-[260px] grow overflow-auto md:h-[315px]" />
                </div>

                <div wire:show="current === 'check'" class="space-y-2.5">
                    <div class="text-center font-[Oswald] text-xs font-extrabold uppercase tracking-wide text-max-dark">
                        Перевірка заповнених даних
                    </div>

                    <div class="text-center text-sm font-bold text-max-dark" x-text="$wire.order.purpose"></div>

                    <div class="flex flex-col gap-y-1.5">
                        <div class="grid grid-cols-2 gap-x-0.5">
                            <x-stepper.check title="Ваше ім`я" field="order.name" />
                            <x-stepper.check title="Місто" field="order.city" />
                        </div>

                        <div class="grid grid-cols-2 gap-x-0.5">
                            <x-stepper.check title="Електронна пошта" field="order.email" />
                            <x-stepper.check title="Номер телефону" field="order.phone" />
                        </div>

                        <div class="grid grid-cols-3 gap-x-0.5">
                            <x-stepper.check title="Вага" postfix="(гр.)" field="order.hair_weight" />
                            <x-stepper.check title="Довжина" postfix="(мм.)" field="order.hair_length" />
                            <x-stepper.check title="Вік" postfix="(р.)" field="order.age" />
                        </div>

                        <div class="grid grid-rows-3 gap-y-2.5">
                            <x-stepper.check title="Колір волосся" field="order.color" type="color" />
                            <x-stepper.check title="Опції" field="order.hair_options"
                                x-text="$wire.order?.hair_options.length ? $wire.order?.hair_options : 'Не зрізані, не фарбовані, без сивини'" />

                            <div class="flex flex-col">
                                <div class="flex justify-between">
                                    <div class="text-sm font-bold text-max-dark">Додатковий опис:</div>
                                    <x-lucide-maximize wire:show="order.description" class="size-4 cursor-pointer"
                                        x-on:click="$wire.descriptionFull=!$wire.descriptionFull" />
                                </div>
                                <div class="line-clamp-1 text-sm text-max-dark/80"
                                    x-bind:class="{ 'italic': !$wire.order.description }"
                                    x-text="$wire.order?.description || 'не вказано'"></div>
                            </div>
                        </div>
                    </div>

                    <div wire:show="descriptionFull" class="absolute start-0 top-0 z-20 size-full rounded-lg bg-max-light"
                        x-transition.duration.500ms>
                        <div class="flex h-full flex-col justify-between">
                            <div class="mb-5 text-center font-[Oswald] font-semibold uppercase">
                                Додатковий опис
                            </div>
                            <x-lucide-minimize x-on:click="$wire.descriptionFull=!$wire.descriptionFull"
                                class="absolute right-0 top-0 size-5 cursor-pointer" />
                            <div class="relative h-full overflow-hidden">
                                <x-lucide-message-circle-more
                                    class="absolute left-1/2 top-1/2 z-0 size-[85%] -translate-x-1/2 -translate-y-1/2 opacity-5"
                                    stroke-width="1.5" />
                                <x-scrollbar class="relative z-10 h-full rounded-lg bg-max-dark/10 p-5">
                                    <p x-text="$wire.order.description" class="font-medium"></p>
                                </x-scrollbar>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label for="rules-confirm"
                            class="flex w-full rounded-lg border border-max-soft/10 bg-max-soft/10 p-2.5 text-sm focus:border-max-dark focus:ring-max-dark">
                            <input id="rules-confirm" type="checkbox" wire:model="rulesConfirm"
                                class="mt-0.5 shrink-0 rounded border-max-soft text-max-dark focus:ring-max-dark disabled:pointer-events-none disabled:opacity-50">
                            <div class="ms-2.5 text-sm">
                                <span class="hidden lg:inline-block">Ознайомлений(а) та погоджуюсь з</span>
                                <span class="lg:hidden">Погоджуюсь з</span>
                                <span wire:click="descriptionFull = true"
                                    class="cursor-pointer font-extrabold text-max-dark">
                                    правилами
                                </span>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- <livewire:is :component="$current" :key="$current" /> --}}

                <x-slot:footer>
                    <x-button wire:click="preview" wire:show="current !== 'person'" wire:loading.attr="disabled"
                        wire:target="preview" class="me-1.5">
                        <x-lucide-loader-2 class="me-1.5 inline-block size-4 animate-spin" wire:loading
                            wire:target='preview' />
                        <x-lucide-arrow-left class="me-1.5 inline-block size-4" wire:loading.remove
                            wire:target='preview' />
                        <span>Назад</span>
                    </x-button>

                    <x-button wire:click="rulesShow = true" class="me-auto">
                        <x-lucide-info class="size-5" />
                    </x-button>

                    <x-button wire:show="current !== 'check'" wire:click="next" wire:loading.attr="disabled"
                        wire:target="next">
                        <div wire:loading wire:target='next'>
                            <span>Перевірка...</span>
                            <x-lucide-loader-2 class="ms-1.5 inline-block size-4 animate-spin" />
                        </div>
                        <div class="flex" wire:loading.remove wire:target='next'>
                            <span>Далі</span>
                            <x-lucide-arrow-right class="ms-1.5 inline-block size-4" />
                        </div>
                    </x-button>

                    <x-button type="submit" wire:show="current === 'check'" wire:click="save"
                        wire:loading.attr="disabled">
                        <div wire:loading wire:target='save'>
                            <span>Відправка...</span>
                            <x-lucide-loader-2 class="ms-1.5 inline-block size-4 animate-spin" />
                        </div>
                        <div wire:loading.remove wire:target='save'>
                            <span>Відправити</span>
                            <x-lucide-send class="ms-1.5 inline-block size-4" />
                        </div>
                    </x-button>
                </x-slot>

                <div wire:show="rulesShow" class="absolute start-0 top-0 z-20 size-full bg-max-light"
                    x-transition.duration.500ms>
                    <div class="flex h-full flex-col justify-between">
                        <div class="mb-5 text-center font-[Oswald] font-semibold uppercase">
                            Правила заявки
                        </div>
                        <x-lucide-x wire:click="rulesShow = false" class="absolute right-0 top-0 size-5 cursor-pointer" />
                        <div class="relative overflow-hidden">
                            <x-lucide-file-text
                                class="absolute left-1/2 top-1/2 z-0 size-[85%] -translate-x-1/2 -translate-y-1/2 rotate-35 opacity-5"
                                stroke-width="1.5" />
                            <x-scrollbar class="relative z-10 h-full overflow-hidden rounded-lg bg-max-dark/10 p-5">
                                <p class="text-balance text-sm font-semibold">
                                    Перед надсиланням замовлення, будь ласка, уважно заповніть усі необхідні поля форми.
                                    Це дозволить нам швидше обробити Ваш запит і надати точну інформацію щодо викупу
                                    волосся.
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
                                    <li><x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Дійсна електронна адреса
                                    </li>
                                    <li><x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Номер телефону для зворотного зв’язку
                                    </li>
                                </ul>
                                <p class="text-balance text-sm font-semibold">
                                    Контактна інформація <i class="opacity-85">(електронна пошта та телефон)</i>
                                    необхідна нам для того, щоб ми могли оперативно зв’язатися з Вами після отримання
                                    замовлення, уточнити деталі та повідомити остаточну вартість волосся.
                                </p>
                                <ul class="text-sm font-semibold">
                                    <span class="font-extrabold">Як відбувається обробка замовлення:</span>
                                    <li><x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Після надсилання форми Ви отримаєте перше сповіщення про те, що наш фахівець
                                        ознайомлюється з Вашим запитом.
                                    </li>

                                    <li><x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Після розгляду замовлення, зазвичай протягом кількох годин, ми надішлемо Вам
                                        другий лист із детальною інформацією щодо вартості, умов викупу та подальших
                                        кроків.
                                    </li>
                                </ul>
                                <ul class="text-sm font-semibold">
                                    <span class="font-extrabold">Додаткова інформація:</span>
                                    <p class="text-balance text-sm font-semibold">
                                        У полі "Ваше повідомлення" Ви можете зазначити будь-які додаткові відомості,
                                        які, на
                                        Вашу думку, можуть вплинути на оцінку волосся. Зокрема:
                                    </p>
                                    <li>
                                        <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Структуру волосся <i class="opacity-85">(пряме, хвилясте, кучеряве тощо)</i>
                                    </li>
                                    <li>
                                        <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Стан зрізу <i class="opacity-85">(наприклад: свіжа рівна стрижка, волосся
                                            зібране в
                                            шиньйон, укладене волосся тощо)</i>
                                    </li>
                                    <li>
                                        <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Чи було волосся пофарбоване, оброблене хімією, чи це натуральний колір
                                    </li>
                                    <li>
                                        <x-lucide-check class="me-0.5 inline-flex size-3.5" />
                                        Інформацію про догляд: як часто милось, чи використовувались засоби для укладки,
                                        чи сушилося феном тощо
                                    </li>
                                </ul>
                                <p class="text-balance text-sm font-bold">
                                    Всі деталі важливі. Чим повнішою буде інформація, тим точніше ми зможемо оцінити
                                    волосся і запропонувати Вам вигідну ціну.
                                </p>
                                <hr class="h-px border-0 bg-black/10">
                                <p class="text-pretty text-xs font-semibold italic">
                                    Дякуємо за довіру! Ми цінуємо кожного клієнта і прагнемо зробити процес співпраці
                                    максимально зручним, прозорим і вигідним для Вас.
                                </p>
                            </x-scrollbar>
                        </div>

                        <div
                            class="mt-5 rounded-lg bg-red-500/15 p-5 text-xs font-extrabold tracking-wider text-red-500/95">
                            Ми не надаємо ваші контактні дані іншим особам та не розсилаємо спам!
                            Не намагайтеся обдурити оцінювача, використовуючи прийоми, щоб поліпшити
                            якість волосся, або розтягувати пасмо, щоб візуально збільшити довжину. наш
                            фахівець обов'язково розпізнає обман.
                        </div>
                    </div>
                </div>

                {{-- <div class="absolute start-0 top-0 size-full rounded-lg bg-white/80" wire:loading wire:target="save">
                <div class="flex h-full flex-col items-stretch justify-center text-max-soft" role="status">
                    <div class="self-center text-center">
                        <div class="border-current inline-block h-14 w-14 animate-spin rounded-full border-[3px] border-t-transparent text-max-soft"
                            role="status" aria-label="loading">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                </div>
            </div> --}}
            </form>
        </x-stepper>
    </x-card>
@endsession

@script
    <script>
        Alpine.data('dropzone', () => ({
            isDropping: false,
            isUploading: false,
        }));
    </script>
@endscript
