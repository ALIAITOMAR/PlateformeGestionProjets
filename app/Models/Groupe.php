<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function apprenants()
    {
        return $this->hasMany(Apprenant::class);
    }

    public function affectations()
    {
        return $this->hasMany(Affectation::class);
    }
}
