<?php

use function Livewire\Volt\{state, rules};
use App\Models\Subscriber;

state(['email']);

rules([
    'email' => 'required|email|min:5|max:50|unique:subscribers,email',
])->messages([
    'email.required' => 'Вкажіть вашу пошту',
    'email.email' => 'Некоректно вказана пошта',
]);

$save = function () {
    $validated = $this->validate();

    Subscriber::create($validated);

    $this->reset();

    session()->flash('subscribe-success');
};
?>

<div class="flex flex-col h-20">
    @session('subscribe-success')
        <div class="flex size-full bg-max-black">
            <div class="flex flex-row items-center justify-center self-center">
                <div class="me-5 flex self-center">
                    <x-lucide-mail class="size-8 text-max-text" />
                </div>
                <div class="flex flex-col">
                    <div class="leading-5 text-max-text">
                        <div>Дякуємо!</div>
                        <div>Ваша пошта успішно збережена.</div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="flex">
            <div class="font-[Oswald] text-sm uppercase tracking-wider text-max-text">Підпишіться</div>
            <div class="inline-block ms-2">
                <x-tooltip variant="light">
                    Оформіть підписку на статті і отримуйте завжди вчасно цікаву інформацію.
                    Ми не розсилаємо спам та листів рекламного характеру.
                </x-tooltip>
            </div>
        </div>
        <form wire:submit="save">
            <x-form.input label="Електронна пошта" name="email" icon="mail" color="dark" wire:target="save"
                wire:loading.attr="disabled">
                <x-slot:button type='submit' wire:loading.attr="disabled">
                    <span wire:loading.remove="hidden" wire:target="save">Підписатись
                        <x-lucide-send class="inline-block size-4 ms-1" />
                    </span>
                    <span wire:loading wire:target="save">Відправка
                        <x-lucide-loader-circle class="inline-block size-4 ms-1 animate-spin" />
                    </span>
                </x-slot>
            </x-form.input>
        </form>
    @endsession
</div>
