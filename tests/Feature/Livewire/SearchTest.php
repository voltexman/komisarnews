<?php

use Livewire\Livewire;

uses(\Illuminate\Foundation\Testing\RefreshDatabase::class);

it('can render', function () {
    Livewire::test('search')
        ->assertSee('');
});
