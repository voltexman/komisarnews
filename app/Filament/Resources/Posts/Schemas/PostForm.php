<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostCategories;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label('Назва статті')
                            ->required()
                            ->prefixIcon('heroicon-o-pencil')
                            ->maxLength(255)
                            ->placeholder('Введіть назву посту'),

                        TextInput::make('slug')
                            ->label('Посилання')
                            ->required()
                            ->prefix(env('APP_URL'))
                            ->unique('posts', 'slug')
                            ->disabled()
                            ->prefixIcon('heroicon-o-link')
                            ->maxLength(255)
                            ->placeholder('Введіть slug для посту'),

                        Select::make('category')
                            ->label('Категорія')
                            ->prefixIcon('heroicon-o-folder')
                            ->options(PostCategories::class)
                            ->native(false),

                        SpatieTagsInput::make('tags')
                            ->type('posts')
                            ->label('Теги')
                            ->prefixIcon('heroicon-o-tag')
                            ->placeholder('Теги для посту (1-5)'),

                        RichEditor::make('body')
                            ->label('Контент')
                            ->columnSpanFull(),
                    ])->columnSpanFull(),

                Section::make()
                    ->columns(2)
                    ->schema([
                        TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->placeholder('Введіть meta title для посту'),

                        Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(5)
                            ->maxLength(255)
                            ->placeholder('Введіть meta description для посту'),
                        Toggle::make('is_published')
                            ->label('Опубліковано')
                            ->default(true),
                    ])->columnSpanFull(),
            ]);
    }
}
