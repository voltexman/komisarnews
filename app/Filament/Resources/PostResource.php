<?php

namespace App\Filament\Resources;

use App\Enums\PostCategories;
use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->label('Назва статті')->columnSpanFull(),

                SpatieMediaLibraryFileUpload::make('image')->collection('posts')->label(false),

                Section::make()->schema([
                    Select::make('category')
                        ->options(PostCategories::class)
                        ->native(false)
                        ->label('Категорія'),

                    TagsInput::make('tags')
                        ->separator(',')
                        ->nestedRecursiveRules([
                            'min:3',
                            'max:20',
                        ])
                        ->label('Теги'),

                    TextInput::make('Посилання')
                        ->prefix('www.komisarnews.com')
                        ->default('dsagasd-dgsadg24t-ad2tef')
                        ->prefixIcon('heroicon-o-link')
                        ->disabled(),

                    DatePicker::make('published_at')
                        ->native(false)
                        ->minDate(now())
                        ->default(now())
                        ->prefix('Починаючи з')
                        ->closeOnDateSelection()
                        ->label('Дата публікації'),
                ]),

                RichEditor::make('body')->columnSpan(2)->label(false),

                Section::make('Параметри сторінки')->schema([
                    ToggleButtons::make('is_published')
                        ->label('Публікація статті')
                        ->boolean()
                        ->options([
                            true => 'Опубліковано',
                            false => 'Приховано',
                        ])
                        ->default(true)
                        ->grouped(),

                    TextInput::make('seo.title')->label('Заголовок'),

                    TextInput::make('seo.description')->label('Опис')
                ])->description('desc')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Action::make('create')
                    ->label('Створити статтю')
                    ->url('posts/create')
                    ->icon('heroicon-m-plus')
                    ->button(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
