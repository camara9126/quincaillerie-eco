<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class article extends Model
{
    protected $fillable = [
        'nom',
        'slug',
        'code',
        'designation',
        'prix_achat',
        'prix',
        'reference',
        'description',
        'image',
        'gal_1',
        'gal_2',
        'stock',
        'stock_min',
        'categorie_id',
        'etiquette',
        'statut',
    ];


    public function categorie() {
        return $this->belongsTo(categorie::class);
    }

    public function ventes() {
        return $this->hasMany(vente::class);
    }

    public function mouvements() {
        return $this->hasMany(mouvement_stock::class);
    }

    // Alerte stock minimum
    public static function produitsEnAlerte()
    {
        return self::whereColumn('stock', '<=', 'stock_min');
    }

    // creation de slug a chaque article
        protected static function boot()
            {
                parent::boot();
            
                static::saving(function ($article) {
                    if (empty($article->slug)) {
                        $slug = Str::slug($article->nom);
                        $originalSlug = $slug;
            
                        // Vérifier l'unicité du slug
                        $count = 1;
                        while (article::where('slug', $slug)->exists()) {
                            $slug = $originalSlug . '-' . $count;
                            $count++;
                        }
            
                        $article->slug = $slug;
                    }
                });
            }
}
