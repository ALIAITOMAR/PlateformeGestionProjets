<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'apprenant_id',
        'question_id',
        'reponse',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function apprenant()
    {
        return $this->belongsTo(Apprenant::class);
    }
}
