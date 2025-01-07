<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'affectation_id ',
        'apprenant_id',
        'note_produit',
        'note_propos',
        'note_processus',
    ];

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }

    public function affectation()
    {
        return $this->belongsTo(Affectation::class);
    }
}
