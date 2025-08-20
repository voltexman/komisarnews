<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class CallbackSent extends Notification
{
    use Queueable;

    public $phone;

    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    public function via(): array
    {
        return ['telegram'];
    }

    public function toTelegram(): TelegramMessage
    {
        return TelegramMessage::create()
            ->line('*Сайт: *'.env('APP_NAME'))
            ->line('*Прохання передзвонити*')
            ->line("*Телефон:* {$this->phone}")
            ->line('_Зараз очікує дзвінка..._');
    }
}
