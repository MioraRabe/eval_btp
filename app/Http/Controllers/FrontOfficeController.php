<?php

namespace App\Http\Controllers;

use App\Models\Typemaison;
use App\Models\Typefinition;

class FrontOfficeController extends Controller{

    public function accueil(){
        $typemaisons = Typemaison::with('vue_typemaison_montant')->get();
        $typefinitions = Typefinition::all();

        // SEO variables
        $seo_title = "Accueil - Home Renovation";
        $seo_description = "Gérez vos projets de construction avec simplicité et efficacité.";
        $seo_keywords = "renovation, construction, maison, devis, Madagascar";

        return view('FrontOffice.index', compact('typemaisons', 'typefinitions', 'seo_title', 'seo_description', 'seo_keywords'));
    }

}
