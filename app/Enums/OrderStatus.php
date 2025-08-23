<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum OrderStatus: string implements HasColor, HasIcon, HasLabel
{
    case NEW = 'new';
    case VIEWED = 'viewed';
    case PROCESSING = 'processing';
    case CANCELED = 'canceled';
    case COMPLETED = 'completed';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NEW => 'Нове',
            self::VIEWED => 'Переглянуто',
            self::PROCESSING => 'В очікуванні',
            self::CANCELED => 'Відмінено',
            self::COMPLETED => 'Завершено',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::NEW => 'danger',
            self::VIEWED => 'info',
            self::PROCESSING => 'warning',
            self::CANCELED => 'gray',
            self::COMPLETED => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::NEW => 'heroicon-o-sparkles',
            self::VIEWED => 'heroicon-o-eye',
            self::PROCESSING => 'heroicon-o-clock',
            self::CANCELED => 'heroicon-o-exclamation-triangle',
            self::COMPLETED => 'heroicon-o-check-circle',
        };
    }

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
