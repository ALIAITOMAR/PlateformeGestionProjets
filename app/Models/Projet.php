<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee',
        'sujet',
        'module',
        'competence',
        'description',
    ];

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
    
    public function taches()
    {
        return $this->hasMany(Tache::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function criteres()
    {
        return $this->hasMany(Critere::class);
    }

    public function livraisons()
    {
        return $this->hasMany(Livrable::class);
    }
}
