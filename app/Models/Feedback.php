<?php

namespace App\Models;

use App\Enums\FeedbackStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedbacks';

    protected $casts = [
        'status' => FeedbackStatus::class,
    ];

    protected $fillable = [
        'name',
        'contact',
        'text',
        'status',
    ];
}
