<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Critere extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'projet_id',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function indicateurs()
    {
        return $this->hasMany(Indicateur::class);
    }
}
