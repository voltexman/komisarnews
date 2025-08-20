<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasIcon, HasLabel
{
    case NEW = 'new';
    case VIEWED = 'viewed';
    case IN_PROGRESS = 'in_progress';
    case CANCELED = 'canceled';
    case READY = 'ready';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NEW => 'Нове',
            self::VIEWED => 'Переглянуто',
            self::IN_PROGRESS => 'В очікуванні',
            self::CANCELED => 'Відмінено',
            self::READY => 'Завершено',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::NEW => 'danger',
            self::VIEWED => 'info',
            self::IN_PROGRESS => 'warning',
            self::CANCELED => 'gray',
            self::READY => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::NEW => 'heroicon-o-sparkles',
            self::VIEWED => 'heroicon-o-eye',
            self::IN_PROGRESS => 'heroicon-o-clock',
            self::CANCELED => 'heroicon-o-exclamation-triangle',
            self::READY => 'heroicon-o-check-circle',
        };
    }

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
