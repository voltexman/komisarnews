@php
    use App\Enums\Order\OrderPurpose;

    $purposes = collect(OrderPurpose::cases())
        ->map(
            fn($case) => [
                'label' => $case->getLabel(),
                'value' => $case->value,
            ],
        )
        ->toArray();
@endphp

<div class="flex w-full flex-col gap-y-5">
    <x-form.select placeholder="Оберіть опцію" wire:model="order.purpose" :options="$purposes" option-label="label"
        option-value="value" />

    <x-form.input label="Ваше ім'я" icon="user" maxlength="40" name="$parent.order.name" />
    <x-form.input label="Місто" icon="map-pin" maxlength="30" name="$parent.order.city" required />
    <x-form.input label="Електронна пошта" icon="mail" maxlength="40" name="$parent.order.email" />
    <x-form.input label="Номер телефону" icon="phone" maxlength="19" name="$parent.order.phone"
        x-mask="+380 (99) 999-99-99" required />
</div>
