<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class devis_details extends Model
{
    protected $fillable = [
        'devis_id',
        'article_id',
        'quantite',
        'prix_unitaire',
        'total',
    ];

    public function details()
    {
        return $this->hasMany(devis_details::class);
    }

    public function article() {
        return $this->belongsTo(article::class);
    }
}
