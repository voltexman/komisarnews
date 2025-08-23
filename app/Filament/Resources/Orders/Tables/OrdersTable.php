<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Enums\OrderStatus;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('№')
                    ->width('1%')
                    ->color('warning')
                    ->weight('semibold')
                    ->prefix('#')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('created_at')
                    ->label('Дата')
                    ->icon(Heroicon::Calendar)
                    ->weight('semibold')
                    ->date(),

                TextColumn::make('purpose')
                    ->width('1%')
                    ->badge()
                    ->label(false),

                TextColumn::make('city')
                    ->label('Місто')
                    ->icon('heroicon-s-map-pin')
                    ->searchable(),

                TextColumn::make('phone')
                    ->label('Телефон')
                    ->icon('heroicon-s-phone')
                    ->copyable()
                    ->searchable(),

                TextColumn::make('length')
                    ->label('Довжина')
                    ->alignCenter()
                    ->suffix(' мм.')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('status')
                    ->label('Статус')
                    ->badge(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(false)
                    ->modalHeading('Деталі замовлення')
                    ->modalWidth('4xl')
                    ->schema([
                        Grid::make(3)->schema([
                            TextEntry::make('id')
                                ->label('№ замовлення')
                                ->prefix('#')
                                ->color('warning')
                                ->weight('bold')
                                ->size('md'),

                            TextEntry::make('created_at')
                                ->date()
                                ->weight('medium')
                                ->icon('heroicon-s-calendar')
                                ->label('Дата'),

                            TextEntry::make('status')
                                ->badge()
                                ->label('Статус'),

                            TextEntry::make('name')
                                ->placeholder('Анонім')
                                ->icon('heroicon-s-user')
                                ->label('Замовник'),

                            TextEntry::make('city')
                                ->icon(Heroicon::MapPin)
                                ->weight('bold')
                                ->label('Місто')
                                ->columnSpan(2),

                            TextEntry::make('email')
                                ->placeholder('Не вказано')
                                ->icon('heroicon-s-envelope')
                                ->copyable()
                                ->label('E-mail'),

                            TextEntry::make('phone')
                                ->icon('heroicon-s-phone')
                                ->weight('bold')
                                ->copyable()
                                ->label('Телефон')
                                ->columnSpan(2),

                            TextEntry::make('weight')
                                ->suffix(' гр.')
                                ->placeholder('не вказано')
                                ->label('Вага'),

                            TextEntry::make('length')
                                ->label('Довжина')
                                ->suffix(' мм.')
                                ->weight('extrabold'),

                            TextEntry::make('age')
                                ->suffix(' р.')
                                ->placeholder('не вказано')
                                ->label('Вік'),

                            TextEntry::make('options')
                                ->label('Опції'),

                            TextEntry::make('color')
                                ->label('Колір'),

                            TextEntry::make('description')
                                ->label('Додатковий опис')
                                ->placeholder('не вказано')
                                ->columnSpanFull(),

                        ]),
                    ])
                    ->mountUsing(function ($form, $record) {
                        if ($record->status === OrderStatus::NEW) {
                            $record->update(['status' => OrderStatus::VIEWED]);
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
