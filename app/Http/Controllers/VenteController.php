<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Entreprise;
use App\Models\Paiements;
use App\Models\Vente;
use App\Models\VenteItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class VenteController extends Controller
{
    public function index(Request $request)
    {


        $ventes = Vente::with('client')->latest()->simplePaginate(5); 

        return view('dashboard.commandes.index', compact('ventes'));
    }

    public function search(Request $request)
    {
        $search = $request->query('search');

        $ventes = Vente::with('client')->when($search, function ($query, $search) {

                $query->where('reference', 'like', "%{$search}%")->orWhereHas('client', function ($q) use ($search) {

                        $q->where('nom', 'like', "%{$search}%");
                });

        })->latest()->paginate(10)->withQueryString(); // 🔑 garde ?search=

        return view('dashboard.commandes.index', compact('ventes', 'search'));
    }
    


    public function create()
    {
        $clients = Client::latest()->get();
        $articles = Article::where('statut', true)->latest()->get();

        return view('dashboard.commandes.create', compact('clients', 'articles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'articles' => 'required|array|min:1',
            'statut',
            'articles.*.article_id' => 'required',
            'articles.*.quantite' => 'required|numeric|min:1',
            'articles.*.prix' => 'required|numeric|min:0',
        ]);



             //dd($request->all());
            $vente = Vente::create([
                'client_id' => $request->client_id,
                'reference' => 'VNT-' . time(),
                'date' => now(),
                'total' => 0,
                'total_tva' => 0,
                'total_ttc' => 0,
                'statut' => 'impayee',
                'user_id' => $request->user()->id,
            ]);

            $total = 0;
            $total_tva = 0;
            $total_ttc = 0;

        foreach ($request->articles as $item) {

            //dd($item);
             if (empty($item['article_id'])) {
                continue;
            }

            $produit = Article::where('id', $item['article_id'])->lockForUpdate()->firstOrFail(); // verrou stock

            // Verification stock mouvement
            if ($produit->stock == 0) {

                 return redirect()->back()->with('danger','Vous devez enregister un mouvement d"abord');
            }

            // Alert stock minimum depasse
            if ($produit->stock <= $produit->stock_min) {
                return redirect()->back()->with('danger','Votre stock minimum est depasse');
            }


            // Verification quantite de stock
            if ($produit->stock < $item['quantite']) {
                
                return redirect()->back()->with('danger','Stock insuffisant pour cette article ');
            }
       

            // Creation vente item
            $entreprise= Entreprise::findOrFail(1); // Recuperation de la TVA de l'entreprise

            
            VenteItem::create([
                'vente_id' => $vente->id,
                'article_id' => $item['article_id'],
                'quantite' => $item['quantite'],
                'prix_unitaire' => $produit->prix,
                'taux_tva' => $entreprise->taux_tva,
                'montant_tva' => ($item['quantite'] * $produit->prix) * ($entreprise->taux_tva /100 ),
                'total_ttc' => ($item['quantite'] * $produit->prix) + (($item['quantite'] * $produit->prix) * ($entreprise->taux_tva /100 )),
                'total' => $item['quantite'] * $produit->prix,
            ]);

            // Mise a jour stock
            $produit->decrement('stock', $item['quantite']);

            // Calcule total + total_tva + total_ttc
            $total += $item['quantite'] *  $item['prix'];
            $total_tva += ($item['quantite'] * $item['prix']) * ($entreprise->taux_tva /100 );
            $total_ttc += ($item['quantite'] * $item['prix']) + (($item['quantite'] * $item['prix']) * ($entreprise->taux_tva /100 ));
            
            // Mise a jour total + total_tva + total_ttc
            $vente->update([
                'total' => $total,
                'total_tva' => $total_tva,
                'total_ttc' => $total_ttc,
            ]);

    }

        return redirect()->route('commandes.index')->with('success','Vente effectue avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vente= Vente::findOrFail($id);
        $paiement= Paiements::where('vente_id', $vente->id)->get();
        //dd($paiement);
         $vente->destroy($id);

        $paiement->update([
            'statut' => 'annule',
            'motif' => 'Annulation manuelle',
            'annule_par' => request()->user()->id,
            'annule_le' => now(),
        ]);

        return redirect()->route('ventes.index')->with('success', ' vente supprimé avec succès');        

    }


    public function show($id)
    {

        $entreprise= Entreprise::findOrFail(1);
        $vente= Vente::with('client', 'items')->findOrFail($id);
//dd($vente);
        $vente->load(['client', 'items']);

        $pdf = Pdf::loadView('dashboard.commandes.facture', compact('vente', 'entreprise'));

        return $pdf->stream('Facture-' . $vente->reference . '.pdf');
    }


    // Facture
    public function facture(Vente $vente)
    {

        $vente->load(['client', 'items.produit']);

        $pdf = Pdf::loadView('dashboard.commandes.facture', compact('vente'));

        return $pdf->download('Facture-' . $vente->reference . '.pdf');
    }
}
