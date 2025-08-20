<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum FeedbackStatus: int implements HasColor, HasIcon, HasLabel
{
    case NEW = 1;
    case VIEWED = 2;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::NEW => 'Нове',
            self::VIEWED => 'Переглянуто',
        };
    }

    public function getColor(): ?string
    {
        return match ($this) {
            self::NEW => 'danger',
            self::VIEWED => 'success',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::NEW => 'heroicon-o-sparkles',
            self::VIEWED => 'heroicon-o-eye',
            default => 'heroicon-o-eye'
        };
    }

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
