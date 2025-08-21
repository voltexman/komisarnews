<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class OrderSent extends Notification
{
    use Queueable;

    public object $order;

    public function __construct(object $order)
    {
        $this->order = $order;
    }

    public function via(): array
    {
        return ['mail', 'telegram'];
    }

    public function toMail(): MailMessage
    {
        return (new MailMessage)
            ->greeting('Замовлення')
            ->subject(env('APP_NAME') . ' - Замовлення')
            ->line("**ID:** #{$this->order->id}")
            ->lineIf($this->order->name, "**Ім`я:** {$this->order->name}")
            ->line("**Місто:** {$this->order->city}")
            ->lineIf($this->order->email, "**E-Mail:** {$this->order->email}")
            ->line("**Телефон:** {$this->order->phone}")
            ->line("**Колір:** {$this->order->color->value}")
            ->lineIf($this->order->weight, "**Вага:** {$this->order->weight}" . 'гр.')
            ->line("**Довжина:** {$this->order->length}" . 'мм')
            ->lineIf($this->order->age, "**Вік:** {$this->order->age}" . 'р.')
            ->line('**Опції:** ' . implode(',', $this->order->options))
            ->lineIf($this->order->description, "**Додатковий опис:** {$this->order->description}");
    }

    public function toTelegram(): TelegramMessage
    {
        return TelegramMessage::create()
            ->line('*Сайт: *' . env('APP_NAME'))
            ->line('*Замовлення*')
            ->line("*ID:* #{$this->order->id}")
            ->lineIf($this->order->name, "*Ім`я:* {$this->order->name}")
            ->line("*Місто:* {$this->order->city}")
            ->lineIf($this->order->email, "*E-Mail:* {$this->order->email}")
            ->line("*Телефон:* {$this->order->phone}")
            ->line("*Колір:* {$this->order->color->value}")
            ->lineIf((bool) $this->order->weight, "*Вага:* {$this->order->weight}" . 'гр.')
            ->line("*Довжина:* {$this->order->length}" . 'мм')
            ->lineIf((bool) $this->order->age, "*Вік:* {$this->order->age}" . 'р.')
            ->line('*Опції:* ' . implode(',', $this->order->options))
            ->lineIf($this->order->description, "*Додатковий опис:* {$this->order->description}");
    }
}
