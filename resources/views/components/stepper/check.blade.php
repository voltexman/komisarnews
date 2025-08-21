@props(['title', 'field', 'prefix' => '', 'postfix' => '', 'type' => 'text', 'icon'])

<div class="flex flex-col">
    <div class="flex items-center gap-1.5">
        @isset($icon)
            <x-dynamic-component :component="'lucide-' . $icon" class="size-4 text-max-dark/80 inline-flex" />
        @endisset
        <div class="text-sm font-bold text-max-dark">{{ $title }}</div>
    </div>

    <div class="flex items-center space-x-1">
        <div class="text-sm font-medium text-max-dark/80" x-bind:class="{ 'italic': !$wire.{{ $field }} }"
            @if ($attributes->has('x-text')) x-text="{{ $attributes->get('x-text') }}"
            @else
                x-text="$wire.{{ $field }} || 'не вказано'" @endif>
        </div>

        @if ($prefix)
            <span class="text-sm text-max-soft">{{ $prefix }}</span>
        @endif

        @if ($postfix)
            <span class="text-xs italic text-max-soft">{{ $postfix }}</span>
        @endif
    </div>
</div>
