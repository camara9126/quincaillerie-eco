<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\categorie;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class articleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles= article::latest()->simplePaginate(10);

        return view('dashboard.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie= categorie::latest()->get();
         return view('dashboard.articles.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nom' => 'required','string',
            'description' => 'required',
            'prix' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gal_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gal_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'stock' => 'required',
            'categorie_id' => 'required', 'exists:categorie,id',
            
        ]);
       
        // Gestion de l'images principal
        if ($request->hasFile('image')) {
            $filename = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('imgArticles', $filename, 'public');
            $request['image'] = '/storage/' . $path;
        } else {
            dd('Aucun fichier image reçu');
        }

        // Gestion des galeries
        if ($request->hasFile('gal_1')) {
            $filename = time().$request->file('gal_1')->getClientOriginalName();
            $path = $request->file('gal_1')->storeAs('imgArticles', $filename, 'public');
            $request['gal_1'] = '/storage/' . $path;
        }

        if ($request->hasFile('gal_2')) {
            $filename = time().$request->file('gal_2')->getClientOriginalName();
            $path = $request->file('gal_2')->storeAs('imgArticles', $filename, 'public');
            $request['gal_2'] = '/storage/' . $path;
        }
        
        // creation de l'article
        Article::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'gal_1' => $request->gal_1 ?? null,
            'gal_2' => $request->gal_2 ?? null,
            'en_promo' => $request->en_promo ?? null,
            'stock' => $request->stock,
            'categorie_id' => $request->categorie_id,
            'image' => $path,
        ]);

        return redirect()->route('article.index')->with('success', 'Article crée avec success.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
