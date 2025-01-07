<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Affectation extends Model
{
    use HasFactory;
    
    protected $casts = [
        'date_echeance' => 'date',
    ];

    protected $fillable = [
        'enseignant_id',
        'projet_id',
        'classe_id',
        'date_echeance',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function livrable()
    {
        return $this->hasOne(Livrable::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
