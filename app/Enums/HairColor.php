<?php

namespace App\Enums;

enum HairColor: string
{
    case BLOND = 'Блонд';
    case LIGHT_BROWN = 'Світло-русий';
    case BROWN = 'Русий';
    case LIGHT_DARK_BROWN = 'Сівтло-коричневий';
    case DARK_BROWN = 'Темно-коричневий';
    case BLACK = 'Чорний';

    public static function colors(): array
    {
        return [
            self::BLOND->value           => 'F9E4B7',
            self::LIGHT_BROWN->value     => 'D9B382',
            self::BROWN->value           => 'A67856',
            self::LIGHT_DARK_BROWN->value => '8B5E3C',
            self::DARK_BROWN->value      => '4B2E1E',
            self::BLACK->value           => '1B1B1B',
        ];
    }

    public function getLabel(): string
    {
        return match ($this) {
            self::BLOND             => 'Блонд',
            self::LIGHT_BROWN       => 'Світло-русий',
            self::BROWN             => 'Русий',
            self::LIGHT_DARK_BROWN  => 'Світло-коричневий',
            self::DARK_BROWN        => 'Темно-коричневий',
            self::BLACK             => 'Чорний',
        };
    }

    public function hex(): string
    {
        return self::colors()[$this->value];
    }

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
