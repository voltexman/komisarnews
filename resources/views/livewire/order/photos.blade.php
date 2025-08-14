<div x-data="dropzone">
    @if ($this->isMaxPhotos())
        <div class="h-40 w-full overflow-hidden rounded-lg border border-dashed border-max-text/30 bg-max-text/10">
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
            <x-lucide-image-up class="text-purple-600 absolute bottom-1 left-16 size-16 -rotate-55 opacity-5" />
            <x-lucide-image-plus class="text-cyan-600 absolute bottom-4 right-32 size-14 rotate-20 opacity-5" />
            <x-lucide-file-image class="text-cyan-600 absolute left-36 top-4 size-16 rotate-10 opacity-5" />
            <div class="flex h-full flex-row">
                <div class="w-1/3 content-center">
                    <div class="relative mx-auto flex size-16">
                        <span
                            class="absolute inline-flex size-full animate-ping rounded-full bg-max-soft/50 opacity-75"></span>
                        <span
                            class="relative inline-flex size-16 rounded-full border-2 border-max-soft/70 bg-max-light">
                            <x-lucide-cloud-upload class="mx-auto size-7 self-center text-max-soft opacity-90" />
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
            <x-alert type='warning' class="mt-5">
                Не застосовуйте фільтрів, які змінюють кольори та якість фото. Не робіть
                фото занадто малим, щоб майстер міг детальніше роздивитись волосся.
            </x-alert>
        @endif
    </div>
</div>

@script
    <script>
        Alpine.data('dropzone', () => ({
            isDropping: false,
            isUploading: false,

            // remove(uploadedFilename) {
            //     $wire.removeUpload('order.photos', uploadedFilename);
            //     $wire.$parent.$refresh()
            // }
        }));
    </script>
@endscript
