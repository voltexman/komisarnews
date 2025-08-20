<div class="max-w-6xl mx-auto flex flex-col gap-y-16">
    @for ($i = 1; $i <= 4; $i++)
        <article
            class="w-full flex flex-col md:flex-row gap-5 lg:gap-10 pb-16 border-b border-max-soft/10 last:border-b-0 last:pb-0 animate-pulse">
            <!-- Date -->
            <div class="flex flex-col items-center w-14 h-16 rounded-md bg-max-soft/20"></div>

            <!-- Image Placeholder -->
            <div class="flex-none w-full md:w-1/2 h-40 lg:h-80 rounded-xl bg-max-soft/20"></div>

            <!-- Content -->
            <div class="flex flex-col justify-between gap-5 grow">
                <!-- Tag -->
                <div class="flex items-center gap-2.5">
                    <div class="w-14 h-3 bg-max-soft/20 rounded"></div>
                    <div class="w-10 h-3 bg-max-soft/20 rounded"></div>
                    <div class="w-16 h-3 bg-max-soft/20 rounded"></div>
                </div>

                <!-- Title -->
                <div class="w-3/4 h-7 bg-max-soft/30 rounded"></div>

                <!-- Paragraph Lines -->
                <div class="space-y-2">
                    <div class="w-full h-4 bg-max-soft/20 rounded"></div>
                    <div class="w-11/12 h-4 bg-max-soft/20 rounded"></div>
                    <div class="w-10/12 h-4 bg-max-soft/20 rounded"></div>
                    <div class="hidden lg:block w-8/9 h-4 bg-max-soft/20 rounded"></div>
                    <div class="hidden lg:block w-10/12 h-4 bg-max-soft/20 rounded"></div>
                    <div class="hidden lg:block w-9/12 h-4 bg-max-soft/20 rounded"></div>
                    <div class="hidden lg:block w-8/12 h-4 bg-max-soft/20 rounded"></div>
                </div>

                <!-- Button Placeholder -->
                <div class="w-28 h-9 me-auto bg-max-black/30 rounded-md"></div>
            </div>
        </article>
    @endfor
</div>
