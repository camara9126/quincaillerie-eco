<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Tiers;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

class TiersController extends Controller
{
    public function index(Request $request)
    {

        $tiers = Tiers::latest()->paginate(10);

        return view('dashboard.tiers.index', compact('tiers'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search');

        $tiers = Tiers::when($search, function ($query, $search) {

                $query->where('nom', 'like', "%{$search}%");

        })->latest()->paginate(10)->withQueryString(); // 🔑 garde ?search=;

        $tiers = Tiers::when($search, function ($query, $search) {

                $query->where('type', 'like', "%{$search}%");

        })->latest()->paginate(10)->withQueryString(); // 🔑 garde ?search=;

        return view('dashboard.tiers.index', compact('tiers','search'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
            'type' => 'required|string|max:255',
        ]);

        Tiers::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'type' => $request->type,
        ]);

        return redirect()->back()->with('success', 'Tiers ajouté');
    }


    public function edit(Tiers $tiers)
    {

       return view('dashboard.tiers.edit', compact('tiers'));
    }
    

    public function update(Request $request, Tiers $tiers)
    {

        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
            'type' => 'required|string|max:255',
        ]);

        $tiers->update($request->only(
            'nom',
            'telephone',
            'email',
            'adresse',
            'type',
        ));

        return redirect()->back()->with('success', 'Tiers modifié');

    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $tiers= Tiers::findOrFail($id);

         $tiers->destroy($id);

        return redirect()->route('tiers.index')->with('success', ' Tiers supprimé avec succès');        

    }

    // Creation nouveau Tiers depuis la section 'Vente'
    public function storeAjax(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'adresse' => 'nullable|string',
            'type' => 'required|string|max:255',
        ]);

        Tiers::create([
            'nom' => $request->nom,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'adresse' => $request->adresse,
            'type' => $request->type,
        ]);

        return redirect()->route('ventes.create')->with('success', 'Nouveau Tiers ajouté');
        //return response()->json($Tiers);
    }


    public function transfer()
    {
        foreach (Client::all() as $Tiers) {
            Tiers::create([
                'nom' => $Tiers->nom,
                'telephone' => $Tiers->telephone,
                'email' => $Tiers->email,
                'adresse' => $Tiers->adresse,
                'type' => 'client',
            ]);
        }

        foreach (Fournisseur::all() as $fournisseur) {
            Tiers::create([
                'nom' => $fournisseur->nom,
                'telephone' => $fournisseur->telephone,
                'email' => $fournisseur->email,
                'adresse' => $fournisseur->adresse,
                'type' => 'fournisseur',
            ]);
        }

        return "OK";
    }
}
