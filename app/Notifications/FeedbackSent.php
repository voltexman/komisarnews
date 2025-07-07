<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\Telegram\TelegramMessage;

class FeedbackSent extends Notification
{
    use Queueable;

    public $feedback;

    public function __construct($feedback)
    {
        $this->feedback = $feedback;
    }

    public function via(object $notifiable): array
    {
        return ['mail', 'telegram'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Зворотній зв`язок')
            ->lineIf($this->feedback->name, "**Ім`я:** {$this->feedback->name}")
            ->lineIf($this->feedback->contact, "**Контакт:** {$this->feedback->contact}")
            ->line("**Повідомлення:** {$this->feedback->text}");
    }

    public function toTelegram(object $notifiable): TelegramMessage
    {
        return TelegramMessage::create()
            ->line('*Зворотній зв`язок*')
            ->lineIf((bool) $this->feedback->name, "*Ім`я:* {$this->feedback->name}")
            ->lineIf((bool) $this->feedback->contact, "*Контакт:* {$this->feedback->contact}")
            ->line("*Повідомлення:* {$this->feedback->text}");
    }
}
