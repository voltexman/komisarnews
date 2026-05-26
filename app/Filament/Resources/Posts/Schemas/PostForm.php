<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Enums\PostCategories;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Головна сітка на 3 колонки розтягнута на всю ширину
                Grid::make(3)->schema([

                    // Ліва колонка: Основний контент + SEO (займає 2 частини з 3)
                    Grid::make(1)->schema([
                        Section::make('Основна інформація')
                            ->columns(2)
                            ->schema([
                                Hidden::make('slug_locked')
                                    ->default(true)
                                    ->dehydrated(false),

                                TextInput::make('name')
                                    ->label('Назва статті')
                                    ->required()
                                    ->prefixIcon('heroicon-o-pencil')
                                    ->maxLength(255)
                                    ->placeholder('Введіть назву посту')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (?string $state, Get $get, Set $set): void {
                                        if ($get('slug_locked')) {
                                            $set('slug', Str::slug((string) $state));
                                        }
                                    }),

                                TextInput::make('slug')
                                    ->label('Посилання (slug)')
                                    ->required()
                                    ->unique('posts', 'slug', ignoreRecord: true)
                                    ->prefixIcon('heroicon-o-link')
                                    ->maxLength(255)
                                    ->placeholder('Введіть slug для посту')
                                    ->disabled(fn (Get $get): bool => (bool) ($get('slug_locked') ?? true))
                                    ->readOnly(fn (Get $get): bool => (bool) ($get('slug_locked') ?? true))
                                    ->dehydrated()
                                    ->suffixAction(
                                        Action::make('toggleSlugLock')
                                            ->icon(fn (Get $get): string => ($get('slug_locked') ?? true) ? 'heroicon-m-lock-closed' : 'heroicon-m-lock-open')
                                            ->tooltip(fn (Get $get): string => ($get('slug_locked') ?? true) ? 'Розблокувати' : 'Заблокувати')
                                            ->action(function (Get $get, Set $set): void {
                                                $currentState = (bool) ($get('slug_locked') ?? true);
                                                $set('slug_locked', ! $currentState);
                                            })
                                    ),

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

                        // НОВА СЕКЦІЯ: SEO Налаштування (розміщена під основним контентом)
                        Section::make('SEO Налаштування')
                            ->columns(2)
                            ->schema([
                                TextInput::make('meta_title')
                                    ->label('Мета заголовок (Meta Title)')
                                    ->maxLength(255)
                                    ->placeholder('Введіть meta title для посту')
                                    ->columnSpanFull(),

                                Textarea::make('meta_description')
                                    ->label('Мета опис (Meta Description)')
                                    ->rows(3)
                                    ->maxLength(180)
                                    ->placeholder('Введіть meta description для посту')
                                    ->helperText('Рекомендована довжина — до 180 символів.')
                                    ->columnSpanFull(),

                                Select::make('meta_robots')
                                    ->label('Роботи (Meta Robots)')
                                    ->prefixIcon('heroicon-o-eye')
                                    ->options([
                                        'index, follow' => 'Індексувати, Слідувати (index, follow)',
                                        'index, nofollow' => 'Індексувати, Не слідувати (index, nofollow)',
                                        'noindex, nofollow' => 'Не індексувати, Не слідувати (noindex, nofollow)',
                                    ])
                                    ->default('index, follow')
                                    ->selectablePlaceholder(false)
                                    ->native(false)
                                    ->columnSpanFull(),
                            ])->columnSpanFull(),
                    ])->columnSpan(2),

                    // Права колонка: Сайдбар (займає 1 частину з 3)
                    Grid::make(1)->schema([
                        Section::make('Медіа')->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                                ->label(false)
                                ->disk('public')
                                ->hiddenLabel(true)
                                ->conversion('preview')
                                ->collection('posts')
                                ->image()
                                ->imageEditor(),
                        ])->columnSpanFull(),

                        Section::make('Публікація')->schema([
                            DateTimePicker::make('published_at')
                                ->label('Дата публікації')
                                ->required()
                                ->default(now())
                                ->native(false),

                            Toggle::make('is_published')
                                ->label('Опубліковано')
                                ->default(true),
                        ])->columnSpanFull(),
                    ])->columnSpan(1),

                ])->columnSpanFull(),
            ]);
    }
}
