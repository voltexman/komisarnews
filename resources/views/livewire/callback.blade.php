<?php

use function Livewire\Volt\{state, rules};
use Illuminate\Support\Facades\Notification;
use App\Notifications\CallbackSent;

state('phone');

rules(['phone' => 'required|min:7|max:20']);

$send = function () {
    $this->validate();

    Notification::route('telegram', env('TELEGRAM_CHAT_ID'))->notify(new CallbackSent($this->phone));

    $this->reset();

    session()->flash('success');
};

?>

<div class="relative flex h-20 flex-col">
    @session('success')
        <div class="flex size-full bg-max-black">
            <div class="flex flex-row items-center justify-center self-center">
                <div class="me-5 flex self-center">
                    <x-lucide-loader-circle class="size-8 animate-spin text-max-text" wire:loading />
                    <x-lucide-phone-call class="size-8 text-max-text" wire:loading.remove />
                </div>
                <div class="flex flex-col">
                    <div class="leading-4 text-max-text">
                        <div class="text-sm">Очікуйте на дзвінок менеджера</div>
                        <div class="text-sm">Ми невдовзі зателефонуємо Вам.</div>
                    </div>
                    <button type="button" class="text-left text-sm font-bold text-max-light/80 disabled:opacity-50"
                        wire:target.except="send" aria-label="Замовити дзвінок на інший номер" wire:click='$refresh'
                        wire:loading.attr="disabled">
                        Замовити дзвінок на інший номер?
                    </button>
                </div>
            </div>
        </div>
    @else
        <form wire:submit='send'>
            <div class="flex">
                <div class="font-[Oswald] text-sm uppercase tracking-wider text-max-text">Передзвоніть мені</div>
                <div class="ms-2 inline-block">
                    <x-tooltip variant="light">
                        Якщо у Вас не вистачає грошей на рахунку, менеджер зателефонує Вам в зручний для Вас час.
                    </x-tooltip>
                </div>
            </div>
            <x-form.input label="Номер телефону" name="phone" icon="phone" color="dark" x-mask="+380 (99) 999-99-99"
                wire:target="send" wire:loading.attr="disabled">
                <x-slot:button type="submit" color="dark" wire:loading.attr='disabled' aria-label="Передзвоніть">
                    <span wire:loading.class='hidden' wire:target="send">Передзвоніть
                        <x-lucide-phone-call class="ms-1 inline-block size-4" />
                    </span>
                    <span wire:loading wire:target="send">Відправка
                        <x-lucide-loader-circle class="ms-1 inline-block size-4 animate-spin" />
                    </span>
                </x-slot>
            </x-form.input>
        </form>
    @endsession
</div>
