@props(['type' => 'info', 'dark', 'title' => ''])

@php
    $color = isset($dark) ? 'text-max-light/70' : 'text-max-dark/90';
@endphp

<div
    {{ $attributes->class([
        'bg-max-soft/15 border-max-soft/10' => $type == 'info',
        'bg-warning/15 border-warning/20' => $type == 'warning',
        'bg-red-500/15 border-red-500/10' => $type == 'danger',
        'border rounded-lg relative p-2.5',
    ]) }}>
    <div class="flex" role="alert" tabindex="-1">
        <div class="shrink-0">
            @if ($type == 'info')
                <x-lucide-info class="self-center text-max-soft size-5" />
            @elseif ($type == 'warning')
                <x-lucide-triangle-alert class="self-center text-yellow-600 size-5" />
            @elseif ($type == 'danger')
                <x-lucide-octagon-alert class="self-center text-red-600 size-5" />
            @endif
        </div>
        <div class="ms-2.5">
            @if ($title)
                <h3 @class(['text-sm font-bold mb-1.5', $color])>
                    {{ $title }}
                </h3>
            @endif
            <div @class([
                'text-max-dark/90' => $type == 'info',
                '' => $type == 'warning',
                'text-red-600' => $type == 'danger',
                'text-xs',
            ])>
                {{ $slot }}
            </div>
        </div>
    </div>

    @isset($close)
        <x-lucide-x wire:click='closeAlert' class="absolute cursor-pointer top-2 right-3 text-max-light/80 size-4" />
    @endisset
</div>
