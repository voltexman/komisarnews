<div class="flex flex-col gap-y-5">

    {{-- <x-form.select name="$parent.order.color">
        @foreach (App\Enums\Order\HairColors::cases() as $option)
            <option value="{{ $option->value }}">
                {{ $option->getLabel() }}
            </option>
        @endforeach
    </x-form.select> --}}

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
        {{-- <span class="text-xs text-max-dark/80">
            <x-lucide-info class="-mt-0.5 inline-block size-3" />
            Вкажіть особливості волосся для оцінки
        </span> --}}
    </div>

    <div>
        <div class="grid grid-cols-3 gap-x-5">
            <!-- Зрізане -->
            <label
                class="group flex cursor-pointer flex-col items-center justify-center gap-y-1.5 rounded-lg border border-max-dark/10 p-1.5 transition-colors duration-300 hover:bg-max-soft/35"
                :class="$wire.$parent.order.hair_options.includes('Зрізане') ? 'bg-max-soft/25' : 'bg-max-soft/15'">

                <input type="checkbox" value="Зрізане" wire:model="$parent.order.hair_options" class="peer hidden" />

                <img src="{{ Vite::asset('resources/images/icons/woman-hair-cut.svg') }}"
                    class="size-2/3 opacity-95 drop-shadow-lg" alt="">

                <div class="flex gap-x-1.5">
                    <span class="flex size-4 items-center justify-center rounded-full border border-max-dark"
                        :class="$wire.$parent.order.hair_options.includes('Зрізане') ? 'bg-max-dark/80' : 'bg-max-light'">
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

                <input type="checkbox" value="Фарбоване" wire:model="$parent.order.hair_options" class="peer hidden" />

                <img src="{{ Vite::asset('resources/images/icons/brush-tool.svg') }}"
                    class="size-2/3 opacity-95 drop-shadow-lg" alt="">

                <div class="flex gap-x-1.5">
                    <span class="flex size-4 items-center justify-center rounded-full border border-max-dark"
                        :class="$wire.$parent.order.hair_options.includes('Фарбоване') ? 'bg-max-dark/80' : 'bg-max-light'">
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

                <input type="checkbox" value="З сивиною" wire:model="$parent.order.hair_options" class="peer hidden" />

                <img src="{{ Vite::asset('resources/images/icons/female-hairs.svg') }}"
                    class="size-2/3 opacity-95 drop-shadow-lg" alt="">

                <div class="flex gap-x-1.5">
                    <span class="flex size-4 items-center justify-center rounded-full border border-max-dark"
                        :class="$wire.$parent.order.hair_options.includes('З сивиною') ? 'bg-max-dark/80' : 'bg-max-light'">
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
