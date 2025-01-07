<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    use HasFactory;

    protected $fillable = [
        //'projet_id',
        'critere_id',
        'libelle',
        'bareme',
    ];

    public function critere()
    {
        return $this->belongsTo(Critere::class);
    }

    /*public function projet()
    {
        return $this->belongsTo(Projet::class);
    }*/
}
