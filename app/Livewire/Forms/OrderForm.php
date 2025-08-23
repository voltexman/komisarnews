<?php

namespace App\Livewire\Forms;

use App\Models\Order;
use Livewire\Attributes\Session;
use Livewire\Form;
use Livewire\WithFileUploads;

class OrderForm extends Form
{
    use WithFileUploads;

    #[Session]
    public $purpose = 'Продаж';

    #[Session]
    public ?string $name = '';

    #[Session]
    public string $city = '';

    #[Session]
    public ?string $email = '';

    #[Session]
    public string $phone = '';

    // #[Session]
    public $photos = [];

    #[Session]
    public $color = '';

    #[Session]
    public ?int $weight = null;

    #[Session]
    public ?int $length = null;

    #[Session]
    public ?int $age = null;

    #[Session]
    public $options = ['Не зрізане', 'Не фарбоване', 'Без сивини'];

    #[Session]
    public string $description = '';

    public function store()
    {
        $validated = $this->validate();

        return Order::create($validated);
    }

    protected function rules(): array
    {
        return [
            'purpose' => 'required|string',
            'name' => 'nullable|string|min:2|max:40',
            'city' => 'required|string|min:2|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string|min:5|max:20',
            'photos' => 'nullable|array',
            'color' => 'required|string',
            'weight' => 'nullable|numeric|min:20|max:1000',
            'length' => 'required|numeric|min:100|max:700',
            'age' => 'nullable|numeric|min:18|max:70',
            'options' => 'nullable|array',
            'description' => 'nullable|string|min:10|max:3000',
        ];
    }

    protected function messages(): array
    {
        return [
            'name.min' => 'Введено замало символів',
            'city.required' => 'Вкажіть ваше місто',
            'city.min' => 'Введено замало символів',
            'phone.required' => 'Вкажіть номер телефону',
            'color.required' => 'Вкажіть колір волосся',
        ];
    }
}
