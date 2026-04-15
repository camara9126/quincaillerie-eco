<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magasin extends Model
{
    protected $fillable = [
        'nom',
        'telephone',
        'adresse',
        'email',
    ];

    public function stock()
    {
        return $this->hasMany((Mouvement_stock::class));
    }

}
