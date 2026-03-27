<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class depenses extends Model
{
    protected $fillable = [
        'user_id',
        'reference',
        'libelle',
        'description',
        'montant',
        'date_depense',
        'mode_paiement',
        'statut',
    ];
}
