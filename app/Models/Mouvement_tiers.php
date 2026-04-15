<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mouvement_tiers extends Model
{
     protected $fillable = [
        'tiers_id',
        'type',
        'montant',
        'sens',
        'reference_id',
        'reference_type',
        'description',
        'date_operation'
    ];

    public function tiers()
    {
        return $this->belongsTo(Tiers::class);
    }

     public function vente()
    {
        return $this->belongsTo(Vente::class);
    }

     public function paiements()
    {
        return $this->hasMany(Paiements::class);
    }

     public function bonCommande()
    {
        return $this->hasMany(Bon_commande::class);
    }

     public function devis()
    {
        return $this->hasMany(Devis::class);
    }
}
