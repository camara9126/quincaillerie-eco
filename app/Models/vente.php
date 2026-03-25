<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vente extends Model
{
     protected $fillable = [
        'client_id',
        'reference',
        'date',
        'total',
        'statut',
        'user_id',
        'total_tva',
        'total_ttc',
    ];
}
