<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'cne',
        'date_naissance',
        'niveau',
        'branche',
        'classe_id',
        'enseignant_id',
    ];

    /*public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }*/

    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function getFullNameAttribute()
    {
        return $this->user->nom . ' ' . $this->user->prenom;
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
