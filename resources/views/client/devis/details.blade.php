@extends('client.layouts.app')

@section('contents')

<div class="container">

    <!-- Header -->
    <div class="row">
        <div class="col">
            <h2>Devis {{ $devis->ref }}</h2>
            <p><strong>Client:</strong> {{ $devis->client->tel }}</p>
            <p><strong>Date de création:</strong> {{ \Carbon\Carbon::parse( $devis->datecreation )->format('d-m-Y H:i') }}</p>
            <p><strong>Type de maison:</strong> {{ $devis->typemaison->nom }} - {{ $devis->typemaison->description }}</p>
            <p><strong>Type de finition:</strong> {{ $devis->typefinition->nom }}</p>
            <p><strong>Date de début des travaux:</strong> {{\Carbon\Carbon::parse( $devis->datedebuttravaux )->format('d-m-Y') }} -- <strong>Date de fin prévue:</strong> {{ \Carbon\Carbon::parse( $devis->datefin )->format('d-m-Y') }}</p>

            <p><strong>Lieu:</strong> {{ $devis->lieu->nom }}</p>
        </div>
    </div>
    <hr>

    <!-- Liste des travaux -->
    <div class="row">
        <div class="col">
            <h3>Liste des travaux</h3>
            <table class="table table-bordered">
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
                        <td style="text-align: right">{{ number_format($detail->quantite,2, ',',' ')  }}</td>
                        <td style="text-align: right">{{ number_format($detail->pu,2, ',',' ')  }}</td>
                        <td style="text-align: right">{{ number_format($detail->montant,2, ',',' ')  }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td style="text-align: right"><strong>{{ number_format($devis->vue_devis_montant->total,2, ',',' ') }}</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Augmentation</td>
                        <td style="text-align: right"><strong>{{ number_format($devis->vue_devis_montant->augmentation,2, ',',' ')  }} %</strong></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total à payer:</td>
                        <td style="text-align: right"><strong>{{ number_format($devis->vue_devis_montant->final,2, ',',' ')  }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    {{-- <!-- Total et informations supplémentaires -->
    <div class="row">
        <div class="col">
            <h3>Montants</h3>
            <p><strong>Total:</strong> {{ $devis->vue_devis_montant->total }}</p>
            <p><strong>Augmentation:</strong> {{ $devis->vue_devis_montant->augmentation }}</p>
            <p><strong>Total à payer:</strong> {{ $devis->vue_devis_montant->final }}</p>
        </div>
    </div> --}}

</div>

@endsection
