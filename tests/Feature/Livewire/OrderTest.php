<?php

use App\Livewire\Order;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Order::class)
        ->assertStatus(200);
});
