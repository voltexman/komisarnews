<div class="flex w-full flex-col gap-y-5">
    <ul class="items-center w-full text-sm font-medium bg-max-soft/15 border border-max-soft/30 rounded-lg sm:flex">
        <li class="w-full border-b border-max-soft/20 sm:border-b-0 sm:border-r">
            <div class="flex items-center p-5">
                <x-radio id="purpose-evaluate" input-class="font-black" wire:model="$parent.order.purpose" rounded="lg"
                    label="Оцінка" value="lg" xl />
            </div>
        </li>
        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
            <div class="flex items-center p-5">
                <x-radio id="purpose-sell" wire:model="$parent.order.purpose" rounded="lg" label="Продаж"
                    value="lg" xl />
            </div>
        </li>
    </ul>

    <x-form.input label="Ваше ім'я" icon="user" maxlength="40" name="$parent.order.name" />
    <x-form.input label="Місто" icon="map-pin" maxlength="30" name="$parent.order.city" required />
    <x-form.input label="Електронна пошта" icon="mail" maxlength="40" name="$parent.order.email" />
    <x-form.input label="Номер телефону" icon="phone" maxlength="19" name="$parent.order.phone"
        x-mask="+380 (99) 999-99-99" required />
</div>
