@props(['icon', 'index', 'title', 'description'])

<div
    class="flex p-5 transition-all duration-300 bg-[#e0d4c8]/50 rounded-lg shadow group shadow-white/20 hover:shadow-lg hover:shadow-max-soft/20">
    <div class="flex flex-col">
        <div class="flex justify-between flex-row font-semibold drop-shadow-md mb-2 uppercase font-[Oswald]">
            @svg('lucide-' . $icon, 'inline-flex shrink-0 me-2.5 size-6')
            <div class="me-auto">{{ $title }}</div>
            <div class="text-lg text-max-black/80 font-[Oswald]">{{ $index }}</div>
        </div>

        <div
            class="w-1/2 h-1 mb-2.5 transition duration-300 ease-out delay-100 translate-x-1/2 rounded-full opacity-0 group-hover:translate-x-0 bg-max-black group-hover:opacity-100">
        </div>

        <div class="font-medium">{{ $description }}</div>
    </div>
</div>
