<?php

namespace App\Livewire\Order;

use Livewire\Component;

class Options extends Component
{
    public $order;

    public function render()
    {
        return view('livewire.order.options');
    }
}
