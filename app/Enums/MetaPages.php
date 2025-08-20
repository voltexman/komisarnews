<?php

namespace App\Enums;

enum MetaPages: string
{
    case MAIN = 'main';
    case POSTS = 'posts';
    case CONTACTS = 'contacts';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
