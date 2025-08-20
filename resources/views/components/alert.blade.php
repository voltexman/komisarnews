@props(['type' => 'info', 'dark', 'close'])

@php
    $color = isset($dark) ? 'text-max-light/70' : 'text-max-dark/90';
@endphp

<div
    {{ $attributes->class([
        'bg-max-soft/15 border-max-soft/20' => $type == 'info',
        'bg-warning/15 border-warning/20' => $type == 'warning',
        'bg-red/15 border-red/20' => $type == 'danger',
        'border rounded-lg overflow-hidden relative',
    ]) }}>
    <div class="flex flex-row">
        <span class="flex px-4 border-r"
            x-bind:class="{
                'border-max-soft/20 bg-max-soft/25': '{{ $type == 'info' }}',
                'border-warning/20 bg-warning/25': '{{ $type == 'warning' }}',
                'border-red/20 bg-red/25': '{{ $type == 'danger' }}'
            }">
            @if ($type == 'info')
                <x-lucide-info class="self-center size-6 text-max-soft" />
            @elseif ($type == 'warning')
                <x-lucide-triangle-alert class="self-center text-warning size-6" />
            @elseif ($type == 'danger')
                <x-lucide-octagon-alert class="self-center text-red size-6" />
            @endif
        </span>
        <div @class([$color, 'px-4 py-2 m-0 text-xs leading-4'])>
            {{ $slot }}
        </div>

        @isset($close)
            <x-lucide-x wire:click='closeAlert' class="absolute cursor-pointer top-2 right-3 text-max-light/80 size-4" />
        @endisset
    </div>
</div>
