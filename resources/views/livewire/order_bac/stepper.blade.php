<x-card x-cloak>
    @session('number')
        <div></div>
    @else
        <form wire:submit="save" class="h-full">
            <x-slot:header>
                <x-stepper.navigation icon='file-text' label='Заявка' step='order.person' />
                <x-stepper.navigation icon='swatch-book' label='Опції' step='order.options' />
                <x-stepper.navigation icon='camera' label='Фото' step='order.photos' />
                <x-stepper.navigation icon='message-circle-more' label='Опис' step='order.description' />
                <x-stepper.navigation icon='file-check' label='Дані' step='order.check' />
            </x-slot>

            <livewire:is :component="$current" :key="$current" />

            <div>
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
            </div>

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
</x-card>

@script
    <script>
        Alpine.data('dropzone', () => ({
            isDropping: false,
            isUploading: false,
        }));
    </script>
@endscript
