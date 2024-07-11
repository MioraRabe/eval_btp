<?php

namespace App\Http\Controllers;


class FrontOfficeController extends Controller{

    public function accueil(){
        $typemaisons = Typemaison::with('vue_typemaison_montant')->get();
        $typefinitions = Typefinition::all();
        return view('FrontOffice.index', compact('typemaisons', 'typefinitions'));
    }


}
