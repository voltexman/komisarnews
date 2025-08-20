<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostCategories;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Назва статті')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('Введіть назву посту'),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(table: 'posts', column: 'slug')
                    ->disabled()
                    ->maxLength(255)
                    ->placeholder('Введіть slug для посту'),


                Select::make('category')
                    ->label('Категорія')
                    ->options(PostCategories::cases())
                    ->native(false),

                RichEditor::make('body')
                    ->label('Контент')
                    ->columnSpanFull(),
            ]);
    }
}
