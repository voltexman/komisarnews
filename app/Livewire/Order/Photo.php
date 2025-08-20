<?php

namespace App\Livewire\Order;

use Livewire\Component;

class Photo extends Component
{
    public $photo;

    public int $index;

    public bool $editShow = false;

    public function mount($photo)
    {
        $this->photo = $photo;
    }

    public function placeholder()
    {
        return view('livewire.order.photo-placeholder');
    }

    public function render()
    {
        return view('livewire.order.photo');
    }
}
