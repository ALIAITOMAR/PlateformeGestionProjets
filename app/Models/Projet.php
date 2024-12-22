<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    
    protected $casts = [
        'competence' => 'json'
    ];

    protected $fillable = [
        'enseignant_id',
        'titre',
        'description',
        'module',
        'competence',
        'piece_jointe',
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

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
