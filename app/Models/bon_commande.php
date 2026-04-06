<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bon_commande extends Model
{
      protected $fillable = [
        'fournisseur_id',
        'reference',
        'total',
        'date_commande',
        'note',
        'statut',
    ];

     public function fournisseur()
    {
        return $this->belongsTo(fournisseur::class);
    }


    public function details()
    {
        return $this->hasMany(bon_commande_details::class);
    }

}
