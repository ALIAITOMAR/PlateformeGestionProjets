<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'enseignant_id',
        'titre',
        'description',
        'module',
        'competence',
        'etat',
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }
    
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

    public function livrables()
    {
        return $this->hasMany(Livrable::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
