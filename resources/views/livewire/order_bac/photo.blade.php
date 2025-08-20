<div class="relative aspect-square overflow-hidden rounded-lg shadow-md">
    <img src="{{ $photo->temporaryUrl() }}" class="size-full object-cover object-center" alt="">

    <div class="absolute right-2 top-2 space-y-2">
        {{-- Підтвердження видалення фото --}}
        <x-dialog caption='Підтвердження'>
            <x-slot:open>
                <button type="button" class="flex size-6 items-center justify-center rounded-full bg-red">
                    <x-lucide-trash-2 class="size-3 text-white" />
                </button>
            </x-slot>

            <div class="flex justify-center gap-y-4">
                <div class="flex flex-col space-y-3 font-semibold">
                    <div class="mx-auto flex size-16 items-center justify-center rounded-full bg-red/40">
                        <x-lucide-circle-help class="inline-flex size-10 text-max-light" />
                    </div>
                    <div class="text-center text-max-medium">
                        <div class="font-semibold">Бажаєте видалити це фото?</div>
                        <div class="text-sm font-light text-max-dark/80">
                            Редагування фото видалиться також
                        </div>
                    </div>
                </div>
            </div>

            <x-slot:actions class="space-x-2" cancel>
                <x-button variant="danger" class="flex"
                    wire:click="$removeUpload('order.photos', {{ $index }})">
                    <x-lucide-trash-2 class="me-2 inline-block size-4" />
                    Видалити
                </x-button>
            </x-slot>
        </x-dialog>

        <button wire:click="editShow = true" type="button"
            class="flex size-6 items-center justify-center rounded-full bg-max-dark">
            <x-lucide-pencil class="size-3 text-white" />
        </button>
    </div>

    <template x-teleport="#stepper">
        <div wire:show="editShow" class="absolute start-0 top-0 z-20 size-full rounded-lg bg-max-light p-5"
            x-transition.duration.500ms>
            <div class="mb-5 text-center font-[Oswald] font-semibold uppercase">
                Редагування фото
            </div>
            <x-lucide-x wire:click="editShow = false" class="absolute right-5 top-5 size-5 cursor-pointer" />

            <img src="{{ $photo->temporaryUrl() }}"
                class="max-h-80 w-full rounded-xl object-cover object-center shadow-md" alt="">

            <div class="mt-5 grid grid-cols-4 flex-row gap-2.5">
                <x-button size="icon">
                    <x-lucide-rotate-ccw class="size-5" />
                </x-button>

                <x-button size="icon">
                    <x-lucide-rotate-cw class="size-5" />
                </x-button>

                <x-button size="icon">
                    <x-lucide-zoom-in class="size-5" />
                </x-button>

                <x-button size="icon">
                    <x-lucide-zoom-out class="size-5" />
                </x-button>

                <x-button size="icon">
                    <x-lucide-flip-horizontal class="size-5" />
                </x-button>

                <x-button size="icon">
                    <x-lucide-flip-vertical class="size-5" />
                </x-button>
            </div>

            <x-button variant="dark">
                <span wire:loading.remove>
                    <x-lucide-save class="me-2.5 inline-flex size-5" />
                    Зберегти
                </span>
                <span wire:loading>
                    <x-lucide-loader-circle class="me-3 inline-block size-4 animate-spin" />
                    Видалення...
                </span>
            </x-button>
        </div>
    </template>
</div>
