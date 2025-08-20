<?php

namespace App\Livewire;

use App\Livewire\Forms\OrderForm;
use App\Notifications\OrderSent;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;

class Order extends Component
{
    use WithFileUploads;

    public OrderForm $order;

    public bool $rulesShow = false;

    public bool $descriptionFull = false;

    public bool $rulesConfirm = false;

    public bool $editShow = false;

    public string $current = 'person';

    protected array $steps = ['person', 'options', 'photos', 'description', 'check'];

    public function preview(): void
    {
        $currentIndex = array_search($this->current, $this->steps);

        $this->current = $this->steps[$currentIndex - 1];
    }

    public function next()
    {
        $currentIndex = array_search($this->current, $this->steps);

        $this->current = $this->steps[$currentIndex + 1];
    }

    public function isMaxPhotos(): bool
    {
        return count($this->order->photos) === 4;
    }

    public function save()
    {
        //        foreach ($this->order->photos as $photo) {
        //            $photo->store(path: 'photos');
        //        }

        $created = $this->order->store();

        Notification::route('mail', env('ADMIN_EMAIL'))
            ->route('telegram', env('TELEGRAM_CHAT_ID'))
            ->notify(new OrderSent((object) $created));

        session()->flash('number', $created->id);

        $this->current = 'person';

        $this->order->reset();
    }

    // public function placeholder()
    // {
    //     return view('livewire.order.placeholder');
    // }

    public function render()
    {
        return view('livewire.order');
    }
}
