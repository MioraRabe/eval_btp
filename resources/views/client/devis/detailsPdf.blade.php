<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devis</title>
    <style>
        /* Styles généraux */
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #333;
        }
        /* Tableau des travaux */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .total-row td {
            font-weight: bold;
        }
        /* Alignement des chiffres à droite */
        td {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Header -->
    <div class="row">
        <div class="col">
            <h2>Devis {{ $devis->ref }}</h2>
            <p><strong>Client:</strong> {{ $devis->client->tel }}</p>
            <p><strong>Date de création:</strong> {{ \Carbon\Carbon::parse( $devis->datecreation )->format('d-m-Y H:i') }}</p>
            <p><strong>Type de maison:</strong> {{ $devis->typemaison->nom }} - {{ $devis->typemaison->description }}</p>
            <p><strong>Type de finition:</strong> {{ $devis->typefinition->nom }}</p>
            <p><strong>Date de début des travaux:</strong> {{\Carbon\Carbon::parse( $devis->datedebuttravaux )->format('d-m-Y ') }} -- <strong>Date de fin prévue:</strong> {{ \Carbon\Carbon::parse( $devis->datefin )->format('d-m-Y') }}</p>
            
            <p><strong>Lieu:</strong> {{ $devis->lieu->nom }}</p>
        </div>
    </div>
    <hr>

    <!-- Liste des travaux -->
    <div class="row">
        <div class="col">
            <h3>Liste des travaux</h3>
            <table>
                <thead>
                    <tr>
                        <th>Code travail</th>
                        <th>Nom travail</th>
                        <th>Unité</th>
                        <th>Quantité</th>
                        <th>Prix unitaire</th>
                        <th>Montant (Ar)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($devis->devisdetails as $detail)
                    <tr>
                        <td>{{ $detail->travaux->code }}</td>
                        <td>{{ $detail->travaux->nom }}</td>
                        <td>{{ $detail->travaux->unite->nom }}</td>
                        <td>{{ number_format($detail->quantite,2, ',',' ') }}</td>
                        <td>{{ number_format($detail->pu,2, ',',' ') }}</td>
                        <td>{{ number_format($detail->montant,2, ',',' ') }}</td>
                    </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="5">Total</td>
                        <td>{{ number_format($devis->vue_devis_montant->total,2, ',',' ') }}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="5">Augmentation</td>
                        <td>{{ number_format($devis->vue_devis_montant->augmentation,2, ',',' ') }} %</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="5">Total à payer:</td>
                        <td>{{ number_format($devis->vue_devis_montant->final,2, ',',' ') }}</td>
                    </tr>
                    <tr class="total-row">
                        <td colspan="5">Paiements effectués:</td>
                        <td><b>{{ number_format($devis->vue_devis_paiement->paiementEffectue,2, ',',' ') }}</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <h3 class="mb-0">Liste des paiements effectués</h3>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Date (paiement)</th>
                <th>Montant (Ar)</th>
            </tr>
        </thead>
        <tbody>+
            @if($devis->paiements->count() > 0)
                @foreach($devis->paiements as $lp)
                    <tr>
                        <td class="align-middle">{{ $lp->ref }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($lp->date)->format('d-m-Y H:i') }}</td>
                        <td class="align-middle" style="text-align: right">{{ number_format($lp->montant,2, ',',' ') }}</td>  
                        
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="2">Paiements effectués:</td>
                    <td><b>{{ number_format($devis->vue_devis_paiement->paiementEffectue,2, ',',' ') }}</b></td>
                </tr>
            @else
                <tr>
                    <td class="text-center" colspan="5">Aucun paiement</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>

</div>

</body>
</html>
