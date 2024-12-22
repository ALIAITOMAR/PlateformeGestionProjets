<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $casts = [
        'expires_at' => 'date',
    ];

    protected $fillable = [
        'email',
        'token',
        'expires_at',
    ];
}
