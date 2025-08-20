<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => OrderStatus::class,
        'hair_options' => 'array',
    ];

    protected $fillable = [
        'purpose',
        'name',
        'city',
        'email',
        'phone',
        'color',
        'hair_weight',
        'hair_length',
        'age',
        'hair_options',
        'description',
        'status',
    ];
}
