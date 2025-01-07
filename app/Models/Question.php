<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'projet_id',
        'question',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
