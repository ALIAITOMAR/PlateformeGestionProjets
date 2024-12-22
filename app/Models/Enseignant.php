<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'cadre',
        'date_embauche',
        'date_affectation',
        'specialite',
        'etablissement',
        'cycle',
        'tel',
    ];

    /*public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }*/

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    
    public function apprenants()
    {
        return $this->hasMany(Apprenant::class);
    }
    
    public function classes()
    {
        return $this->hasMany(Classe::class);
    }

    public function projets()
    {
        return $this->hasMany(Projet::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }

}
