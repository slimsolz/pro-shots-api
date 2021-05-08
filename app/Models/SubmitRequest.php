<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubmitRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'public_id',
        'product_request_id',
        'user_id',
        'status',
    ];
}
