<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Travaux;
use App\Models\Unite;

class TravauxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travauxes = Travaux::all();
        return view('travauxes.index', compact('travauxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unites = Unite::all();
        return view('travauxes.create', compact('unites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'nom' => 'required',
            'unite_id' => 'required',
            'pu' => 'required|numeric',
        ]);

        Travaux::create($request->all());

        return redirect()->route('travauxes.index')
            ->with('success', 'Travail ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $travail = Travaux::findOrFail($id);
        return view('travauxes.show', compact('travail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travail = Travaux::findOrFail($id);
        $unites = Unite::all();
        return view('travauxes.edit', compact('travail', 'unites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required',
            'nom' => 'required',
            'unite_id' => 'required',
            'pu' => 'required|numeric|min:0',
        ]);

        $travail = Travaux::findOrFail($id);
        $travail->update($request->all());

        return redirect()->route('travauxes.index')
            ->with('success', 'Travail modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travail = Travaux::findOrFail($id);
        $travail->delete();

        return redirect()->route('travauxes.index')
            ->with('success', 'Travail supprimé avec succès.');
    }
}
