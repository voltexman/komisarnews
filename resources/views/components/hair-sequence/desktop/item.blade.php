@props(['image', 'title', 'description'])

<div
    class="relative flex flex-col items-center group overflow-hidden transition-shadow duration-300 rounded-2xl shadow-lg bg-max-soft/15 hover:shadow-xl group-hover:shadow-max-soft/80 h-80">
    <img data-src="{{ Vite::asset('resources/images/' . $image) }}" class="object-cover size-full lazyload" alt="">
    <div class="absolute inset-0 size-full p-10 group-hover:backdrop-blur-xs bg-max-dark/70 transition duration-300">
        <div class="flex flex-col justify-end size-full">
            <h2 class="mb-2.5 text-xl font-bold text-white uppercase font-[Oswald]">
                {{ $title }}
            </h2>

            <div class="text-base leading-5 text-gray-200">
                {{ $description }}
            </div>
        </div>
    </div>
</div>
