<?php

namespace App\Livewire\Order;

use App\Livewire\Forms\OrderForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Photos extends Component
{
    use WithFileUploads;

    public OrderForm $order;

    public bool $editShow = false;

    public function isMaxPhotos(): bool
    {
        return count($this->order->photos) === 4;
    }

    public function render()
    {
        return view('livewire.order.photos');
    }
}
