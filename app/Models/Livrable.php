<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livrable extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu_livre',
        'etat',
        'note_produit',
        'note_propos',
        'note_processus',
        'projet_id',
        'apprenant_id',
    ];

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }
}
