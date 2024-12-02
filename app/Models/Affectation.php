<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    
    protected $casts = [
        'date_affectation' => 'date',
        'date_fin' => 'date',
    ];

    protected $fillable = [
        'date_affectation',
        'date_fin',
        'projet_id',
        'enseignant_id',
        'classe_id',
    ];

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    /*public function livrables()
    {
        return $this->hasMany(Livrable::class);
    }*/

    public function livrable()
    {
        return $this->hasOne(Livrable::class);
    }
}
