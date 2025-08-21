@props(['label', 'description', 'icon'])

<label class="w-full cursor-pointer flex items-center gap-2.5">
    <input type="radio" value="{{ $label }}" wire:model="{{ $attributes->get('wire:model') }}" class="hidden peer">
    <div class="w-full px-5 py-2.5 transition peer-checked:bg-max-soft/20 hover:bg-max-soft/25">
        <h3 class="w-full text-lg font-bold text-max-dark">
            <x-dynamic-component :component="'lucide-' . $icon" class="inline-flex size-5" />
            <span>{{ $label }}</span>
        </h3>
        <p class="text-xs text-max-soft">{{ $description }}</p>
    </div>
</label>
