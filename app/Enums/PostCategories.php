<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PostCategories: string implements HasLabel
{
    case ARTICLES = 'article';
    case CITIES = 'city';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::ARTICLES => 'Статті',
            self::CITIES => 'Міста',
        };
    }

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
