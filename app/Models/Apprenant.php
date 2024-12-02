<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'niveau',
        'groupe_id',
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }

    public function livraisons()
    {
        return $this->hasMany(Livrable::class);
    }
}
