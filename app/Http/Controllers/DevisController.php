<?php

namespace App\Http\Controllers;

use App\Models\article;
use Illuminate\Http\Request;
use App\Models\Devis;
use App\Models\Client;
use App\Models\devis_details;
use App\Models\vente;
use App\Models\venteItem;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class DevisController extends Controller
{
    /**
     * Liste des devis
     */
    public function index()
    {
        $devis = Devis::with('client')->latest()->paginate(10);
        return view('dashboard.devis.index', compact('devis'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $clients = Client::all();
        $articles = article::all();

        return view('dashboard.devis.create', compact('clients', 'articles'));
    }

    /**
     * Enregistrer un devis
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'articles' => 'required|array',
            'entreprise_id',
            'articles.*.article_id' => 'required',
            'articles.*.quantite' => 'required|numeric|min:1',
            'articles.*.prix' => 'required|numeric|min:0',
        ]);

        // Création du devis
        $devis = Devis::create([
            'reference' => 'DEV-' . strtoupper(Str::random(6)),
            'client_id' => $request->client_id,
            'entreprise_id' => 1,
            'total' => 0,
            'statut' => 'en_attente',
            'date_devis' => now(),
            'date_expiration' => now()->addDays(7),
        ]);

        $total = 0;

        // Enregistrement des produits
        foreach ($request->articles as $item) {

            $ligneTotal = $item['quantite'] * $item['prix'];

            devis_details::create([
                'devis_id' => $devis->id,
                'article_id' => $item['article_id'],
                'quantite' => $item['quantite'],
                'prix_unitaire' => $item['prix'],
                'total' => $ligneTotal,
            ]);

            $total += $ligneTotal;
        }

        // Mise à jour du total
        $devis->update([
            'total' => $total
        ]);

        return redirect()->route('devis.index')
            ->with('success', 'Devis créé avec succès');
    }

    /**
     * Afficher un devis
     */
    public function show($id)
    {
        $articles= article::latest()->get();

        $devis = Devis::with('client', 'details')->findOrFail($id);
//dd($devis);
        return view('dashboard.devis.show', compact('devis','articles'));
    }

    /**
     * Supprimer un devis
     */
    public function destroy($id)
    {
        $devis = Devis::findOrFail($id);
        $devis->delete();

        return redirect()->route('devis.index')->with('success', 'Devis supprimé');
    }

    /**
     * Valider un devis
     */
    public function valider($id)
    {
        $devis = Devis::findOrFail($id);

        $devis->update([
            'statut' => 'valide'
        ]);

        return redirect()->route('devis.index')->with('success', 'Devis validé');
    }

    /**
     * Refuser un devis
     */
    public function refuser($id)
    {
        $devis = Devis::findOrFail($id);

        $devis->update([
            'statut' => 'refuse'
        ]);

        return redirect()->route('devis.index')->with('success', 'Devis refusé');
    }

    /**
     * Convertir devis en vente
     */
    public function convertirEnVente($id)
    {
        $devis = Devis::with('details')->findOrFail($id);

        // Créer la vente
        $vente = vente::create([
            'client_id' => $devis->client_id,
            'total' => $devis->total,
        ]);

        // Ajouter les produits
        foreach ($devis->details as $detail) {

            venteItem::create([
                'vente_id' => $vente->id,
                'article_id' => $detail->produit_id,
                'quantite' => $detail->quantite,
                'prix' => $detail->prix_unitaire,
            ]);
        }

        return redirect()->route('commandes.index', $vente->id)->with('success', 'Devis converti en vente');
    }


    // Facture
    public function facture($id)
    {

        $articles= article::latest()->get();

        $devis = Devis::with('client', 'details')->findOrFail($id);

        $devis->load(['client', 'details']);
//dd($devis);
        $pdf = Pdf::loadView('dashboard.devis.facture', compact('devis'));

        return $pdf->stream ('Facture-' . $devis->reference . '.pdf');
    }
}