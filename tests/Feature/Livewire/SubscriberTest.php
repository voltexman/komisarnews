<?php

use App\Models\Subscriber;
use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

test('user can subscribe with valid email', function () {
    Livewire::test('subscriber')
        ->set('email', 'test@example.com')
        ->call('save')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('subscribers', [
        'email' => 'test@example.com',
    ]);
});

test('email is required', function () {
    Livewire::test('subscriber')
        ->set('email', '')
        ->call('save')
        ->assertHasErrors(['email' => 'required']);
});

test('email must be valid', function () {
    Livewire::test('subscriber')
        ->set('email', 'not-an-email')
        ->call('save')
        ->assertHasErrors(['email' => 'email']);
});

test('email must be unique', function () {
    Subscriber::create(['email' => 'test@example.com']);

    Livewire::test('subscriber')
        ->set('email', 'test@example.com')
        ->call('save')
        ->assertHasErrors(['email']);
});
