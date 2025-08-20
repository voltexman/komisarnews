<?php

namespace App\Livewire\Order;

use App\Livewire\Forms\OrderForm;
use Livewire\Component;

class Person extends Component
{
    public OrderForm $order;

    public function render()
    {
        return view('livewire.order.person');
    }
}
