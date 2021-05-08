<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'available_dates',
        'status',
        'user_id'
    ];

    protected $casts = ['available_dates' => 'array'];
}
