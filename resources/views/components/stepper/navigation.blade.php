@props(['step', 'active', 'icon', 'label'])

<li>
    <div
        class="relative min-w-[28px] min-h-[28px] flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row text-xs align-middl">
        <span class="flex items-center justify-center shrink-0 mx-auto font-medium rounded-full size-8">
            @svg('lucide-' . $icon, 'size-6 text-max-dark')
            <x-lucide-check class="hidden size-6 text-max-soft" />
        </span>
    </div>
    <div class="grow md:grow-0">
        <span class="block text-xs font-semibold text-max-dark lg:text-sm">
            {{ $label }}
        </span>
    </div>
</li>
