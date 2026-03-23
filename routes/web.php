<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\ProfileController;
use App\Models\article;
use App\Models\categorie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $categories= categorie::latest()->get();
    $nouveau= article::where('etiquette', 'nouveau')->latest()->simplePaginate(4);
    $promo= article::where('etiquette', 'promo')->latest()->simplePaginate(3);
    $materiaux= article::where('categorie_id', 7)->latest()->get();
    $outillages= article::where('categorie_id', 6)->latest()->get();
    $plomberies= article::where('categorie_id', 2)->latest()->get();
    $articles= article::latest()->simplePaginate(8);
    return view('home.index', compact('nouveau','promo','articles','categories','materiaux','outillages','plomberies'));
})->name('home');

Route::get('/boutique', function () {

    $categories= categorie::latest()->get();
    $articles= article::latest()->simplePaginate(12);
    $phares= article::where('etiquette', 'nouveau')->latest()->get();

    return view('home.shop', compact('categories','articles','phares'));
})->name('boutique');

Route::get('/contact', function () {

    $categories= categorie::latest()->get();

    return view('home.contact', compact('categories'));
})->name('contact');


// Detail article
Route::get('/detail/{slug}', function ($slug) {

    $categories= categorie::latest()->get();
    $article= article::where('slug', $slug)->firstOrfail();
    $phares= article::where('categorie_id', $article->categorie_id)->latest()->get();

    return view('home.detail', compact('article','categories','phares'));
})->name('detail');


// Detail categorie
Route::get('/category/{slug}', function ($slug) {

    $categorie= categorie::where('slug', $slug)->firstOrfail();

    return view('home.detail', compact('categorie'));
})->name('category');


Route::get('/dashboard', function () {
    $categories= categorie::latest()->get();
    $articles= article::latest()->get();

    return view('dashboard.index', compact('articles','categories'));
    
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    // Route Categorie
    Route::resource('/categorie', categorieController::class);
    Route::get('/csearch', [categorieController::class, 'search'])->name('categorie.search');

    // Route Article
    Route::resource('/article', articleController::class);
    Route::get('/asearch', [articleController::class, 'search'])->name('article.search');

});



require __DIR__.'/auth.php';
