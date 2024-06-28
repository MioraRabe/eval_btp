<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DevisParMoisParAnnee;



class StatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $totalFinal = DB::table('vue_devis_montant')->selectRaw('SUM(final) as total_final')->first();
        // $totalFinal = $totalFinal->total_final;
        $totalDevis = DB::table('vue_devis_paiement')->sum('final');
        $eff = DB::table('vue_devis_paiement')->sum('paiementEffectue');

        $annees = DevisParMoisParAnnee::selectRaw('annee')
            ->distinct()
            ->get();
        return view('dashboard', compact('totalDevis','eff','annees'));     

    }

    /**
     * Store a newly created resource in storage.
     */

    public function getMontantParMois(Request $request)
    {
        $totalDevis = DB::table('vue_devis_paiement')->sum('final');
        $eff = DB::table('vue_devis_paiement')->sum('paiementEffectue');

        $annees = DevisParMoisParAnnee::selectRaw('annee')
            ->distinct()
            ->get();
        $montantsParMois = DevisParMoisParAnnee::where('annee', $request->annee)->get();
        // return $montantsParMois;

        return view('dashboard', compact('totalDevis','eff','annees', 'montantsParMois'));
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
