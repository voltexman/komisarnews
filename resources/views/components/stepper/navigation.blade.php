@props(['step', 'active', 'icon', 'label', 'checked' => false])

<li>
    <div class="flex flex-col items-center md:w-full md:inline-flex md:flex-wrap md:flex-row">
        <div @class([
            'flex items-center justify-center shrink-0 mx-auto rounded-full size-10 p-1.5',
            'bg-max-soft/15' => !$active && !$checked,
            'bg-max-dark/30 animate-bounce' => $active,
            'bg-max-dark' => $checked,
        ])>
            @if ($checked)
                <x-lucide-check class="size-5 text-max-light" />
            @else
                <x-dynamic-component :component="'lucide-' . $icon" :class="$active ? 'size-5.5 text-max-dark' : 'size-5.5 text-max-soft'" />
            @endif
        </div>
    </div>
    <div class="grow md:grow-0">
        <span @class([
            'block text-xs font-semibold lg:text-sm text-center mt-1.5',
            'text-max-dark' => $active || $checked,
            'text-max-soft' => !$active && !$checked,
        ])>
            {{ $label }}
        </span>
    </div>
</li>
