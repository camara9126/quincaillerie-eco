<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiers extends Model
{
     protected $fillable = [
        'nom',
        'telephone',
        'email',
        'adresse',
        'type',
    ];

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }

    public function article() {
        return $this->hasMany(Article::class);
    }
}
