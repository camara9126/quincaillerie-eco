<?php

use App\Http\Controllers\articleController;
use App\Http\Controllers\categorieController;
use App\Http\Controllers\ProfileController;
use App\Models\article;
use App\Models\categorie;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    $categories= categorie::latest();
    $articles= article::latest();

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

    // Route Article
    Route::resource('/article', articleController::class);
});



require __DIR__.'/auth.php';
