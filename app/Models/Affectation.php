<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'date_affectation',
        'date_fin',
        'projet_id',
        'enseignant_id',
        'groupe_id',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function enseignant()
    {
        return $this->belongsTo(Enseignant::class);
    }

    public function groupe()
    {
        return $this->belongsTo(Groupe::class);
    }
}
