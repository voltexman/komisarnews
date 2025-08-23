<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Enums\OrderStatus;
use App\Filament\Resources\Orders\OrderResource;
use App\Models\Order;
use Filament\Resources\Pages\ListRecords;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Support\Icons\Heroicon;
use Illuminate\Database\Eloquent\Builder;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    public function getTabs(): array
    {
        return [
            'Всі' => Tab::make(),
            'Нові' => Tab::make()
                ->icon(Heroicon::Sparkles)
                ->badge(Order::query()->where('status', OrderStatus::NEW)->count())
                ->badgeColor('danger')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatus::NEW)),
            'Переглянуті' => Tab::make()
                ->icon(Heroicon::Eye)
                ->badge(Order::query()->where('status', OrderStatus::VIEWED)->count())
                ->badgeColor('info')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatus::VIEWED)),
            'В очікуванні' => Tab::make()
                ->icon(Heroicon::Clock)
                ->badge(Order::query()->where('status', OrderStatus::PROCESSING)->count())
                ->badgeColor('warning')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatus::PROCESSING)),
            'Відмінені' => Tab::make()
                ->icon(Heroicon::ExclamationTriangle)
                ->badge(Order::query()->where('status', OrderStatus::CANCELED)->count())
                ->badgeColor('gray')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatus::CANCELED)),
            'Завершені' => Tab::make()
                ->icon(Heroicon::CheckCircle)
                ->badge(Order::query()->where('status', OrderStatus::COMPLETED)->count())
                ->badgeColor('success')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('status', OrderStatus::COMPLETED)),
        ];
    }
}
