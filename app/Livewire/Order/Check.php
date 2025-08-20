<?php

namespace App\Livewire\Order;

use App\Livewire\Forms\OrderForm;
use Livewire\Component;

class Check extends Component
{
    public OrderForm $order;

    public bool $descriptionFull = false;

    public bool $rulesConfirm = false;

    public function render()
    {
        return view('livewire.order.check');
    }
}
