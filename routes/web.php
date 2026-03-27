<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MouvementController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\VenteController;
use App\Models\article;
use App\Models\categorie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $categories= categorie::latest()->get();
    $nouveau= article::where('etiquette', 'nouveau')->where('statut', true)->latest()->simplePaginate(4);
    $promo= article::where('etiquette', 'promo')->where('statut', true)->latest()->simplePaginate(3);
    $materiaux= article::where('categorie_id', 7)->where('statut', true)->latest()->get();
    $outillages= article::where('categorie_id', 6)->where('statut', true)->latest()->get();
    $plomberies= article::where('categorie_id', 2)->latest()->get();
    $articles= article::where('statut', true)->latest()->simplePaginate(8);
    return view('home.index', compact('nouveau','promo','articles','categories','materiaux','outillages','plomberies'));
})->name('home');

Route::get('/boutique', function () {

    $categories= categorie::latest()->get();
    $articles= article::where('statut', true)->latest()->paginate(12);
    $phares= article::where('etiquette', 'nouveau')->where('statut', true)->latest()->get();

    return view('home.shop', compact('categories','articles','phares'));
})->name('boutique');

Route::get('/contact', function () {

    $categories= categorie::latest()->get();

    return view('home.contact', compact('categories'));
})->name('contact');

Route::get('/test', function () {

    return view('test');
})->name('test');


// Detail article
Route::get('/article/{slug}', [HomeController::class, 'detail'])->name('detail');

// Detail categorie
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category');

// Recherche Client 
Route::get('/recherche', [HomeController::class, 'search'])->name('recherche');

// Route Commande en ligne
Route::post('/commande', [HomeController::class, 'commande'])->name('commande');


Route::get('/dashboard', function () {
    $categories= categorie::latest()->get();
    $articles= article::latest()->get();
    $article= article::limit(5)->latest()->get();

    return view('dashboard.index', compact('articles','categories','article'));
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/{entreprise}', [ProfileController::class, 'entrepriseUpdate'])->name('entreprise.eUpdate');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/rapports', [RapportController::class, 'rapport'])->name('rapports.rapport');
});


// Routes Articles et Categories
Route::middleware('auth')->group(function () {
    // Route Categorie
    Route::resource('/categorie', categorieController::class);

    // Recherche categorie par Admin
    Route::get('/csearch', [categorieController::class, 'search'])->name('categorie.search');

    // Route Article
    Route::resource('/article', articleController::class);

    // Recheche article par Admin
    Route::get('/asearch', [articleController::class, 'search'])->name('article.search');

});

// Routes Mouvements
Route::middleware('auth')->group(function () {
    Route::get('/mouvements', [MouvementController::class, 'index'])->name('mouvements');
    Route::post('/mouvements', [MouvementController::class, 'stock'])->name('stock');

});


// Routes Clients, Devis et Commandes
Route::middleware('auth')->group(function () {
    Route::resource('/clients', ClientController::class);
    Route::resource('/commandes', VenteController::class);
    Route::resource('/devis', DevisController::class);

    Route::get('/devis/{devis}/facture', [DevisController::class, 'facture'])->name('devis.facture');

    Route::get('/devis/{devis}/valider', [DevisController::class, 'valider'])->name('devis.valider');
    Route::get('/devis/{devis}/refuser', [DevisController::class, 'refuser'])->name('devis.refuser');
    Route::get('/devis/{devis}/convertir', [DevisController::class, 'convertir'])->name('devis.convertir');
    //Route::post('/client', [MouvementController::class, 'stock']);

});


// Routes Depenses, Recettes et Paiements
Route::middleware('auth')->group(function () {
    Route::resource('/paiements', PaiementController::class);
    Route::put('/paiements/{id}/annuler', [PaiementController::class, 'annuler'])->name('paiements.annuler');

    Route::resource('/recettes', VenteController::class);
    Route::resource('/depenses', DepenseController::class);
    //Route::post('/client', [MouvementController::class, 'stock']);

});


require __DIR__.'/auth.php';
