<div class="flex flex-col gap-y-5 w-full">
    <x-stepper.purpose>
        <x-stepper.purpose.item label="Оцінка" description="Дізнатись вартість вашого волосся"
            wire:model="order.purpose" />
        <x-stepper.purpose.item label="Продаж" description="Продати волосся за вигідною ціною"
            wire:model="order.purpose" />
    </x-stepper.purpose>

    <x-form.input label="Ваше ім'я" icon="user" maxlength="40" name="order.name" />
    <x-form.input label="Місто" icon="map-pin" maxlength="30" name="order.city" required />
    <x-form.input label="Електронна пошта" icon="mail" maxlength="40" name="order.email" />
    <x-form.input label="Номер телефону" icon="phone" maxlength="19" name="order.phone" x-mask="+380 (99) 999-99-99"
        required />
</div>
