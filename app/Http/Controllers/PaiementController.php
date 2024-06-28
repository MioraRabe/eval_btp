<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Paiement;


class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->input();
        Paiement::create([
        'ref'=> 'P00'. ((Paiement::orderBy('id', 'desc')->first()->id) + 1),
        'devis_id'=> $request->devis_id,
        'date'=> $request->datepaiement,
        'montant'=>$request->montant,
        ]);

        return redirect()->route('devis.paiement',$request->devis_id)->with('success', 'Paiement effectué avec succès!');

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
