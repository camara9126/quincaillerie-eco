<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mouvement_stock extends Model
{
    protected $fillable = [
        'article_id',
        'type',
        'quantite',
        'reference',
    ];

    public function article()
    {
        return $this->belongsTo((article::class));
    } 
}
