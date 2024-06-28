<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Typemaison;
use App\Models\Typefinition;
use App\Models\Devis;
use App\Models\Devisdetails;
use App\Models\Lieu;
use App\Models\Unite;
use App\Models\Client;
use App\Models\Typemaisontravaux;
use App\Models\Travaux;
use App\Models\Vue_typemaison_montant;
use App\Models\Vue_devis_paiement;
use App\Models\Paiement;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


use Dompdf\Dompdf;

class DevisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devis= Devis::with(['typemaison','typefinition','devisdetails','vue_devis_montant'])->where('client_id', session('client')->id)->get();

        // return $devis;
        return view('client.devis.index', compact('devis'));     
    }

    public function adminindex()
    {
        $devis= Devis::with(['typemaison','typefinition','devisdetails','vue_devis_paiement'])->get();

        // return $devis;
        return view('admin.devis.index', compact('devis'));     
    }

    public function details(string $id){
        $devis= Devis::with(['client','typemaison','typefinition','lieu','devisdetails.travaux.unite','vue_devis_montant'])->where('id', $id)->first();
        // Calcul de la date de fin dans le contrôleur
        $devis->datefin = \Carbon\Carbon::parse($devis->datedebuttravaux)->addDays((int)$devis->typemaison->duree);
        
        // return $devis;
        return view('admin.devis.details', compact('devis'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $typemaisons = Typemaison::with('vue_typemaison_montant')->get();
        $typefinitions = Typefinition::all();
        return view('client.devis.create', compact('typemaisons', 'typefinitions'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->input();
        
        $devis= Devis::create([
            'ref'=> 'Dv00'. ((Devis::orderBy('id', 'desc')->first()->id) + 1),
            'client_id'=>session('client')->id,
            'datecreation'=>now(),
            'typemaison_id'=>$request->typemaison_id,
            'typefinition_id'=>$request->typefinition_id,
            'augmentation'=> Typefinition::where('id', $request->typefinition_id)->first()->augmentation,
            'datedebuttravaux'=>$request->datedebuttravaux,
            'lieu_id'=> Lieu::firstOrCreate(['nom' => $request->lieu]) ->id,
        ]);

        $tmTravaux= Typemaisontravaux::with('travaux')-> where('typemaison_id', $request->typemaison_id )->get();
        // return $tmTravaux;
        $det=[];
        foreach ($tmTravaux as $travaux) {
            $det[]=Devisdetails::create( [
                'devis_id'=>$devis->id,
                'travaux_id'=>$travaux->travaux_id,
                'quantite'=>$travaux->quantite,
                'pu'=>$travaux->travaux->pu,
                'montant'=>($travaux->quantite)*($travaux->travaux->pu),
            ]);
        }

        // return $det;
        return redirect()->route('devis')->with('success', 'Devis ajouté avec succès!');
  
    }
    public function export(string $id){
        $devis= Devis::with(['client','typemaison','typefinition','lieu','devisdetails.travaux.unite','vue_devis_montant','paiements','vue_devis_paiement'])->where('id', $id)->first();
        // Calcul de la date de fin dans le contrôleur
        $devis->datefin = \Carbon\Carbon::parse($devis->datedebuttravaux)->addDays((int)$devis->typemaison->duree);
        
        // return $devis;
        // return view('client.devis.detailsPdf', compact('devis'));

        $html = view('client.devis.detailsPdf', compact('devis'));

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);

        $dompdf->render();

        $filename = 'devis-' . $devis->ref  . '.pdf';

        return $dompdf->stream($filename);
    }

    public function paiement(string $id){
        $listPaiement= Paiement::where('devis_id', $id)->get();
        $paiement= Vue_devis_paiement::with('devis')->where('devis_id', $id)->first();
        // return $paiement;
        return view('client.devis.paiement', compact('paiement','listPaiement'));
    }

    public function truncate(){
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Devis::truncate();
        Paiement::truncate();
        Devisdetails::truncate();
        Typemaisontravaux::truncate();
        Travaux::truncate();
        Typemaison::truncate();
        Typefinition::truncate();
        Lieu::truncate();
        Unite::truncate();
        Client::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->route('import.import')->with('success', 'Database reinitializé!');
        // return redirect()->back()->with('success', 'Database reinitializé!');
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
