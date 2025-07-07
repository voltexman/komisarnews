<?php

use function Livewire\Volt\{state, rules};
use App\Models\Subscribe;

state(['email']);

rules([
    'email' => 'required|email|min:5|max:50',
])->messages([
    'email.required' => 'Вкажіть вашу пошту',
    'email.email' => 'Некоректно вказана пошта',
]);

$save = function () {
    $validated = $this->validate();

    Subscribe::create($validated);

    $this->reset();

    session()->flash('subscribe-success');
};
?>

<div class="flex flex-col h-20">
    @session('subscribe-success')
        <div class="flex flex-col items-center self-center px-10">
            <x-lucide-mail class="mb-2 size-8 text-max-text" />
            <span class="leading-4 text-center text-max-text">
                Дякуємо. Ваша пошта успішно збережена.
            </span>
        </div>
    @else
        <div class="flex">
            <div class="text-sm uppercase text-max-text">Підпишіться</div>
            <div class="inline-block ms-2">
                <x-tooltip color='white'>
                    Оформіть підписку на статті і отримуйте завжди вчасно цікаву інформацію.
                    Ми не розсилаємо спам та листів рекламного характеру.
                </x-tooltip>
            </div>
        </div>
        <form wire:submit='save'>
            <x-form.input label="Електронна пошта" name="email" icon="mail" color="dark" wire:target='save'
                wire:loading.attr='disabled'>
                <x-slot:button type='submit' wire:loading.attr='disabled'>
                    <span wire:loading.remove='hidden' wire:target='save'>Підписатись
                        <x-lucide-send class="inline-block size-4 ms-1" />
                    </span>
                    <span wire:loading wire:target='save'>Відправка
                        <x-lucide-loader-circle class="inline-block size-4 ms-1 animate-spin" />
                    </span>
                </x-slot>
            </x-form.input>
        </form>
    @endsession
</div>
