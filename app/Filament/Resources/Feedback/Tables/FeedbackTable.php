<?php

namespace App\Filament\Resources\Feedback\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FeedbackTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->striped()
            ->columns([
                TextColumn::make('name')
                    ->label('Відправник')
                    ->icon('heroicon-m-user')
                    ->placeholder('анонім')
                    ->searchable(),

                TextColumn::make('contact')
                    ->label('Контакт')
                    ->icon('heroicon-m-phone')
                    ->copyable()
                    ->placeholder('не вказано')
                    ->searchable(),

                IconColumn::make('is_read')
                    ->label('Статус')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-sparkles')
                    ->trueColor('info')
                    ->alignCenter()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Дата')
                    ->date()
                    ->icon('heroicon-m-calendar')
                    ->alignCenter()
                    ->searchable(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(false)
                    ->modalHeading('Деталі відгуку')
                    ->modalWidth('4xl')
                    ->schema([
                        Grid::make(3)->schema([
                            TextEntry::make('name')
                                ->placeholder('анонім')
                                ->icon(Heroicon::User)
                                ->label('Відправник'),

                            TextEntry::make('contact')
                                ->placeholder('не вказано')
                                ->icon(Heroicon::ChatBubbleLeft)
                                ->copyable()
                                ->label('Контакт'),

                            TextEntry::make('created_at')
                                ->date()
                                ->icon(Heroicon::Calendar)
                                ->label('Дата'),

                            TextEntry::make('message')
                                ->label('Повідомлення')
                                ->columnSpanFull(),
                        ]),
                    ])
                    ->mountUsing(function ($form, $record) {
                        if (! $record->is_read) {
                            $record->update(['is_read' => true]);
                        }
                    }),
                DeleteAction::make()->label(false),
            ])
            ->defaultSort('created_at', 'desc')
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
