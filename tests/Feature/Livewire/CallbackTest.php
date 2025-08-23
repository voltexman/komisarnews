<?php

use App\Notifications\CallbackSent;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user can request a callback with valid phone', function () {
    Notification::fake();

    Livewire::test('callback')
        ->set('phone', fake()->numerify('############'))
        ->call('send')
        ->assertHasNoErrors()
        ->assertSee('Очікуйте на дзвінок менеджера');

    Notification::assertSentOnDemand(CallbackSent::class);
});

test('phone is required', function () {
    Livewire::test('callback')
        ->set('phone', '')
        ->call('send')
        ->assertHasErrors(['phone' => 'required']);
});

test('phone must have min and max length', function () {
    Livewire::test('callback')
        ->set('phone', '123')
        ->call('send')
        ->assertHasErrors(['phone' => 'min']);

    Livewire::test('callback')
        ->set('phone', str_repeat('1', 25))
        ->call('send')
        ->assertHasErrors(['phone' => 'max']);
});
