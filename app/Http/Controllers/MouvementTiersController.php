<?php

namespace App\Http\Controllers;

use App\Models\Mouvement_tiers;
use App\Models\Tiers;
use Illuminate\Http\Request;

class MouvementTiersController extends Controller
{
       /**
     * Liste des mouvements
     */
    public function index(Request $request)
    {
        $tiers_id = $request->tiers_id;

        $tiers = Tiers::all();

        $query = Mouvement_tiers::with('tiers')->latest();

        if ($tiers_id) {
            $query->where('tiers_id', $tiers_id);
        }

        $mouvements = $query->paginate(10);

        // 🔥 Calcul du solde global (si tiers sélectionné)
        $solde = 0;

        if ($tiers_id) {
            $debit = Mouvement_tiers::where('tiers_id', $tiers_id)->where('sens', 'debit')->sum('montant');

            $credit = Mouvement_tiers::where('tiers_id', $tiers_id)->where('sens', 'credit')->sum('montant');

            $solde = $credit - $debit;
        }

        return view('dashboard.mouvementTiers.index', compact('mouvements', 'tiers', 'tiers_id', 'solde'));
    }

    /**
     * Relevé d’un tiers
     */
    public function show(string $id)
    {
        $tiers = Tiers::findOrFail($id);

        $mouvements = Mouvement_tiers::where('tiers_id', $tiers->id)->orderBy('date_operation', 'asc')->get();

        $debit = $mouvements->where('sens', 'debit')->sum('montant');
        $credit = $mouvements->where('sens', 'credit')->sum('montant');

        $solde = $credit - $debit;

        return view('dashboard.mouvementTiers.show', compact('tiers', 'mouvements', 'debit', 'credit', 'solde'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tiers_id' => 'required',
            'type' => 'required',
            'montant' => 'required|numeric|min:1',
            'sens' => 'required',
        ]);


        if ($request->type == 'vente') {
            $sens = 'credit';
        } elseif ($request->type == 'achat') {
            $sens = 'debit';
        } else {
            $sens = $request->sens;
        }

        Mouvement_tiers::create([
            'tiers_id' => $request->tiers_id,
            'type' => $request->type,
            'montant' => $request->montant,
            'sens' => $sens,
            'description' => $request->description,
            'date_operation' => $request->date_operation,
        ]);

        return redirect()->route('comptabilite.index')->with('success', 'Mouvement créé avec succès');
    }
}
