<?php

namespace App\Http\Controllers;

use App\Models\Typefinition;
use Illuminate\Http\Request;

class TypefinitionController extends Controller
{
    public function index()
    {
        $typefinitions = Typefinition::all();
        return view('typefinitions.index', compact('typefinitions'));
    }

    public function show($id)
    {
        $typefinition = Typefinition::findOrFail($id);
        return view('typefinitions.show', compact('typefinition'));
    }

    public function edit($id)
    {
        $typefinition = Typefinition::findOrFail($id);
        return view('typefinitions.edit', compact('typefinition'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'augmentation' => 'required|numeric|min:0',
        ]);

        $typefinition = Typefinition::findOrFail($id);
        $typefinition->nom = $request->nom;
        $typefinition->augmentation = $request->augmentation;
        $typefinition->save();

        return redirect()->route('typefinitions.index')->with('success', 'Type de finition mis à jour avec succès!');
    }
}
