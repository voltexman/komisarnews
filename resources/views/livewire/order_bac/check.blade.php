<div class="space-y-2">
    <div class="text-center font-[Oswald] text-xs font-extrabold uppercase">
        Перевірка заповнених даних
    </div>

    <div class="text-center text-sm font-bold text-max-dark"
        x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order?.purpose }" x-text="label">
    </div>

    <div class="flex flex-col gap-y-1.5">
        <div class="grid grid-cols-2 gap-x-0.5">
            <div class="flex flex-col">
                <div class="text-sm font-bold">Ваше ім'я:</div>
                <div class="line-clamp-1 text-sm" x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order.name }"
                    x-text="$wire.$parent.order?.name || 'не вказано'"></div>
            </div>

            <div class="flex flex-col text-sm">
                <div class="font-bold" x-bind:class="!$wire.$parent.order?.city ? 'text-red' : 'text-max-dark'">
                    Місто:
                </div>
                <div class="line-clamp-1 font-normal"
                    x-bind:class="!$wire.$parent.order?.city ? 'text-red italic' : 'text-gray-600'"
                    x-text="$wire.$parent.order?.city || 'не вказано'"></div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-x-0.5">
            <div class="flex flex-col">
                <div class="text-sm font-bold">Електронна пошта:</div>
                <div class="line-clamp-1 text-sm" x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order?.email }"
                    x-text="$wire.$parent.order?.email || 'не вказано'"></div>
            </div>

            <div class="flex flex-col">
                <div class="text-sm font-bold"
                    x-bind:class="!$wire.$parent.order?.phone ? 'text-red' : 'text-max-dark'">
                    Номер телефону:
                </div>
                <div class="line-clamp-1 text-sm"
                    x-bind:class="!$wire.$parent.order?.phone ? 'text-red italic' : 'text-gray-600'"
                    x-text="$wire.$parent.order?.phone || 'не вказано'"></div>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-x-0.5">
            <div class="flex flex-col">
                <div class="text-sm font-bold">Вага:</div>
                <div class="text-sm" x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order.weight }"
                    x-text="$wire.$parent.order?.weight ? $wire.$parent.order?.weight + 'гр.' : 'не вказано'">
                </div>
            </div>

            <div class="flex flex-col text-sm">
                <div class="font-bold" x-bind:class="!$wire.$parent.order?.length ? 'text-red' : 'text-max-dark'">
                    Довжина:
                </div>
                <div class="font-normal"
                    x-bind:class="!$wire.$parent.order?.length ? 'text-red italic' : 'text-gray-600'"
                    x-text="$wire.$parent.order?.length ? $wire.$parent.order?.length + 'мм.' : 'не вказано'">
                </div>
            </div>

            <div class="flex flex-col text-sm">
                <div class="font-bold">Вік:</div>
                <div class="font-normal" x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order?.age }"
                    x-text="$wire.$parent.order?.age ? $wire.$parent.order?.age + 'р.' : 'не вказано'"></div>
            </div>
        </div>

        <div class="grid grid-rows-3 gap-y-2.5">
            <div class="flex flex-col">
                <div class="text-sm font-bold">Колір:</div>
                <div class="text-sm" x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order?.color }"
                    x-text="label">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-sm font-bold">Опції:</div>
                <div class="text-sm"
                    x-text="$wire.$parent.order?.options.length ? $wire.$parent.order?.options : 'Не зрізані, не фарбовані, без сивини'">
                </div>
            </div>
            <div class="flex flex-col">
                <div class="flex justify-between">
                    <div class="text-sm font-bold">Додатковий опис:</div>
                    <x-lucide-maximize wire:show="$parent.order.description" class="size-4 cursor-pointer"
                        x-on:click="$wire.descriptionFull=!$wire.descriptionFull" />
                </div>
                <div class="line-clamp-1 text-sm"
                    x-bind:class="{ 'italic text-gray-500': !$wire.$parent.order.description }"
                    x-text="$wire.$parent.order?.description || 'не вказано'"></div>
            </div>
        </div>
    </div>

    <div wire:show="descriptionFull" class="absolute start-0 top-0 z-20 size-full rounded-lg bg-max-light p-5"
        x-transition.duration.500ms>
        <div class="flex h-full flex-col justify-between">
            <div class="mb-5 text-center font-[Oswald] font-semibold uppercase">
                Додатковий опис
            </div>
            <x-lucide-minimize x-on:click="$wire.descriptionFull=!$wire.descriptionFull"
                class="absolute right-5 top-5 size-5 cursor-pointer" />
            <div class="relative h-full overflow-hidden">
                <x-lucide-message-circle-more
                    class="absolute left-1/2 top-1/2 z-0 size-[85%] -translate-x-1/2 -translate-y-1/2 opacity-5"
                    stroke-width="1.5" />
                <x-scrollbar class="relative z-10 h-full rounded-lg bg-max-dark/10 p-5">
                    <p x-text="$wire.$parent.order.description" class="font-medium"></p>
                </x-scrollbar>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <label for="rules-confirm"
            class="flex w-full rounded-lg border border-max-soft/10 bg-max-soft/10 p-2.5 text-sm focus:border-max-dark focus:ring-max-dark">
            <input id="rules-confirm" type="checkbox" wire:model="$parent.rulesConfirm"
                class="mt-0.5 shrink-0 rounded border-max-soft text-max-dark focus:ring-max-dark disabled:pointer-events-none disabled:opacity-50">
            <div class="ms-2.5 text-sm">
                <span class="hidden lg:inline-block">Ознайомлений(а) та погоджуюсь з</span>
                <span class="lg:hidden">Погоджуюсь з</span>
                <span wire:click="descriptionFull = true" class="cursor-pointer font-extrabold text-max-dark">
                    правилами
                </span>
            </div>
        </label>
    </div>
</div>
