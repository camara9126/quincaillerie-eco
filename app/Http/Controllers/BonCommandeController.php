<?php

namespace App\Http\Controllers;

use App\Models\article;
use App\Models\bon_commande;
use App\Models\bon_commande_details;
use Illuminate\Http\Request;
use App\Models\Fournisseur;
use Illuminate\Support\Str;

class BonCommandeController extends Controller
{
    /**
     * Liste des bons de commande
     */
    public function index()
    {
        $bonCommandes = bon_commande::with('fournisseur')->latest()->get();

        return view('dashboard.bonCommandes.index', compact('bonCommandes'));
    }

    /**
     * Formulaire création
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        $articles = article::all();

        return view('dashboard.bonCommandes.create', compact('fournisseurs', 'articles'));
    }

    /**
     * Enregistrer un bon de commande
     */
    public function store(Request $request)
    {
        $request->validate([
            'fournisseur_id' => 'required',
            'articles' => 'required|array',
            'articles.*.article_id' => 'required',
            'articles.*.quantite' => 'required|numeric|min:1',
            'articles.*.prix' => 'required|numeric|min:0',
            'note' => 'nullable',
        ]);

        // Création du bon de commande
        $bonCommande = bon_commande::create([
            'reference' => 'BC-' . strtoupper(Str::random(6)),
            'fournisseur_id' => $request->fournisseur_id,
            'total' => 0,
            'statut' => 'en_attente',
            'date_commande' => now(),
            'note' => $request->note ?? 'null',
        ]);

        $total = 0;

        foreach ($request->articles as $item) {

            $ligneTotal = $item['quantite'] * $item['prix'];

            bon_commande_details::create([
                'bon_commande_id' => $bonCommande->id,
                'article_id' => $item['article_id'],
                'quantite' => $item['quantite'],
                'prix_unitaire' => $item['prix'],
                'total' => $ligneTotal,
            ]);

            $total += $ligneTotal;
        }

        // Mise à jour du total
        $bonCommande->update([
            'total' => $total
        ]);

        return redirect()->route('bonCommande.index')->with('success', 'Bon de commande créé avec succès');
    }

    /**
     * Afficher un bon de commande
     */
    public function show($id)
    {
        $bonCommande = bon_commande::with('fournisseur', 'details.article')->findOrFail($id);

        return view('dashboard.bonCommandes.show', compact('bonCommande'));
    }

    /**
     * Supprimer un bon de commande
     */
    public function destroy($id)
    {
        $bonCommande = bon_commande::findOrFail($id);
        $bonCommande->delete();

        return back()->with('success', 'Bon de commande supprimé');
    }

    /**
     * Marquer comme envoyé
     */
    public function envoyer($id)
    {
        $bonCommande = bon_commande::findOrFail($id);

        $bonCommande->update([
            'statut' => 'envoye'
        ]);

        return back()->with('success', 'Bon de commande envoyé');
    }

    /**
     * Marquer comme reçu + mise à jour du stock
     */
    public function recevoir($id)
    {
        $bonCommande = bon_commande::with('details.article')->findOrFail($id);

        // Mise à jour du stock
        foreach ($bonCommande->details as $detail) {

            $article = $detail->article;

            if ($article) {
                $article->stock += $detail->quantite;
                $article->save();
            }
        }

        // Mise à jour statut
        $bonCommande->update([
            'statut' => 'recu'
        ]);

        return back()->with('success', 'Stock mis à jour, commande reçue');
    }
    // Facture
    public function facture($id)
    {
       return view('dashboard.bonCommandes.facture');
    }
}