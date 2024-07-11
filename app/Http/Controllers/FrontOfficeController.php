<?php

namespace App\Http\Controllers;


class FrontOfficeController extends Controller{

    public function accueil(){
        return view('FrontOffice.index');
    }


}
