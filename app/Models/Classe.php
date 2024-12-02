<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function apprenants()
    {
        return $this->hasMany(Apprenant::class);
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

    public function livrables()
    {
        return $this->hasMany(Livrable::class);
    }

}
