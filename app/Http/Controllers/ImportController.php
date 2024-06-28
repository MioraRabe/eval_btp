<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Typemaison;
use App\Models\Travaux;
use App\Models\Unite;
use App\Models\Typemaisontravaux;
use App\Models\Devis;
use App\Models\Devisdetails;
use App\Models\Client;
use App\Models\Lieu;
use App\Models\TypeFinition;
use App\Models\Paiement;

use Carbon\Carbon;

class ImportController extends Controller
{
    public function import()
    {
        return view('import.import');
    }
    public function importpaiement()
    {
        return view('import.importpaiement');
    }

    public function store(Request $request){
//-----------------------------travaux, maison-------------------------------------
if ($request->hasFile('maisontravaux')) {
    $file = $request->file('maisontravaux');

        $handle = fopen($file->getPathname(), 'r');
        $header = fgetcsv($handle);

        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
            var_dump($row);
            $unite = Unite::firstOrCreate(['nom' => $row[5]]);
    
            $typemaison = TypeMaison::firstOrCreate([
                'nom' => $row[0],
                'description' => $row[1],
                'duree' => (float) str_replace(',', '.', $row[8]),
                'surface' => (float) str_replace(',', '.', $row[2]), 
            ]);
    
            $travail = Travaux::firstOrCreate([
                'code' => $row[3],
                'nom' => $row[4],
                'unite_id' => $unite->id,
                'pu' => (float) str_replace(',', '.', $row[6]), 
            ]);
    
            $typemaisontravaux = Typemaisontravaux::create([
                'typemaison_id' => $typemaison->id,
                'travaux_id' => $travail->id,
                'quantite' => (float) str_replace(',', '.', $row[7]), 
            ]);
        }

        fclose($handle);
    }

        //--------------------------------Devis----------------------------------------
if ($request->hasFile('devis')) {
        
        $fileDev = $request->file('devis');
        
        $handleDev = fopen($fileDev->getPathname(), 'r');
        $headerDev = fgetcsv($handleDev);

        while (($row = fgetcsv($handleDev, 1000, ",")) !== FALSE) {
            $client = Client::firstOrCreate(['tel' => $row[0]]);
    
            $lieu = Lieu::firstOrCreate(['nom' => $row[7]]);
    
            $typeFinition = TypeFinition::firstOrCreate(['nom' => $row[3]], ['augmentation' => (float) str_replace(',', '.', $row[4])]);
    
            $typeMaison = TypeMaison::where('nom', $row[2])->first();
            if (!$typeMaison) {
                $typeMaison = TypeMaison::firstOrCreate([
                    'nom' => $row[2],
                ]);
            }

            $devis = Devis::create([
                'ref' => $row[1],
                'client_id' => $client->id,
                'datecreation' => Carbon::createFromFormat('d/m/Y', $row[5])->format('Y-m-d'),
                'typemaison_id' => $typeMaison->id,
                'typefinition_id' => $typeFinition->id,
                'augmentation' => (float) str_replace(',', '.', $row[4]),
                'datedebuttravaux' => Carbon::createFromFormat('d/m/Y', $row[6])->format('Y-m-d'),
                'lieu_id' => $lieu->id,
            ]);
    
            $tmTravaux = Typemaisontravaux::with('travaux')->where('typemaison_id', $devis->typemaison_id)->get();
            foreach ($tmTravaux as $travaux) {
                Devisdetails::create([
                    'devis_id' => $devis->id,
                    'travaux_id' => $travaux->travaux_id,
                    'quantite' => $travaux->quantite,
                    'pu' => $travaux->travaux->pu,
                    'montant' => $travaux->quantite * $travaux->travaux->pu,
                ]);
            }        }
    
        // Fermer le fichier de devis CSV
        fclose($handleDev);
    
    }

    return redirect()->back()->with('success', 'Fichier CSV importé avec succès.');

}

    public function storePaiement(Request $request)
    {
    if ($request->hasFile('paiement')) {
            $file = $request->file('paiement');
    
            $handle = fopen($file->getPathname(), 'r');
            $header = fgetcsv($handle);
    
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $devis = Devis::where('ref', $row[0])->first();

                if ($devis) {
                    $paie = Paiement::where('ref', $row[1])->get();
                    if($paie->count() >0){

                    }
                    else{

                        Paiement::create([
                            'devis_id' => $devis->id,
                            'ref' => $row[1],
                            'date' => Carbon::createFromFormat('d/m/Y', $row[2])->format('Y-m-d'),
                            'montant' => (float) str_replace(',', '.', $row[3]),
                        ]);
                    }
                }
            }
    
            fclose($handle);
        }
    
        return redirect()->back()->with('success', 'Fichier CSV importé avec succès.');
    }

    // public function store(Request $request)
    // {
    //     $file = $request->file('file');
    //     $handle = fopen($file->getPathname(), 'r');

    //     // Ignorer la première ligne (en-têtes)
    //     fgetcsv($handle);

    //     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    //         // Vérifiez si la date est manquante ou mal formatée
    //         if (empty($data[4]) || !preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $data[4])) {
    //             // Ignorer la ligne si la date est manquante ou mal formatée
    //             continue;
    //         }

            
    //         try {
    //             // Tentative de création de la date avec le format spécifié
    //             $date = Carbon::createFromFormat('d/m/Y', $data[4])->format('Y-m-d');
    //         } catch (\Exception $e) {
    //             // Gérer l'erreur, par exemple en enregistrant une erreur ou en continuant avec la prochaine ligne
    //             continue;
    //         }
            
    //         Import::create([
    //             'NumSeance' => $data[0],
    //             'Film' => $data[1],
    //             'Categorie' => $data[2],
    //             'Salle' => $data[3],
    //             'Date' => $date,
    //             'Heure' => $data[5],
    //         ]);

    //         // Création ou récupération de la catégorie
    //         $categorie = Categorie::firstOrCreate(['nom' => $data[2]]);

    //         // Création ou récupération du film avec la catégorie
    //         $film = Film::firstOrCreate(['nom' => $data[1], 'categorie_id' => $categorie->id]);

    //         // Création ou récupération de la salle
    //         $salle = Salle::firstOrCreate(['nom' => $data[3]]);


    //         // Insérer la séance avec le film et la salle
    //         Seance::create([
    //             'numSeance' => $data[0],
    //             'film_id' => $film->id,
    //             'salle_id' => $salle->id,
    //             'date' => $date,
    //             'heure' => $data[5],
    //         ]);
    //     }

    //     fclose($handle);

    //     return redirect()->back()->with('success', 'Fichier CSV importé avec succès.');
    // }
}
