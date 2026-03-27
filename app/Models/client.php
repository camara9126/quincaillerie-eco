<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $fillable = [
        'nom',
        'telephone',
        'email',
        'adresse',
    ];

    public function ventes()
    {
        return $this->hasMany(Vente::class);
    }
}
