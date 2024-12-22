<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'projet_id', 'parent_id', 'commentaire'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function replies()
    {
        return $this->hasMany(Commentaire::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Commentaire::class, 'parent_id');
    }
}
