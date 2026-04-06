<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class fournisseur extends Model
{
    protected $fillable = [
        'nom',
        'telephone',
        'email',
        'adresse',
        'statut',
    ];
}
