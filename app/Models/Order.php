<?php

namespace App\Models;

use App\Enums\HairColor;
use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $casts = [
        'color' => HairColor::class,
        'status' => OrderStatus::class,
        'options' => 'array',
    ];

    protected $fillable = [
        'purpose',
        'name',
        'city',
        'email',
        'phone',
        'color',
        'weight',
        'length',
        'age',
        'options',
        'description',
        'status',
    ];
}
