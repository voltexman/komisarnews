<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;

uses(RefreshDatabase::class);

it('can render', function () {
    Livewire::test('search')
        ->assertSee('');
});
