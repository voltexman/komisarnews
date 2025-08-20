<div class="bg-max-light h-[590px] p-5 rounded-lg shadow-lg shadow-max-black/25">
    <div class="animate-pulse">
        <div class="w-[70%] mx-auto h-6 mt-3 rounded-lg bg-max-soft/40"></div>

        @php $array = ['', '', '', '', '']; @endphp

        <div class="flex justify-between px-10 mt-5">
            @foreach ($array as $item)
                <div class="">
                    <div class="rounded-full bg-max-soft/20 size-10"></div>
                    <div class="w-full h-2 mt-3 rounded-lg bg-gray-500/20"></div>
                </div>
            @endforeach
        </div>

        <ul class="mt-8 space-y-5">
            @foreach ($array as $item)
                <li class="w-full h-12 rounded-lg bg-max-soft/20"></li>
            @endforeach
        </ul>

        <div class="flex justify-between mt-12">
            <span class="w-20 rounded-lg h-9 bg-max-soft/30"></span>
            <span class="rounded-lg ms-3 size-9 bg-max-soft/30"></span>
            <span class="w-20 rounded-lg h-9 bg-max-soft/30 ms-auto"></span>
        </div>
    </div>
</div>
