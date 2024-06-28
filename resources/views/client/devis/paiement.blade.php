@extends('client.layouts.app')

@section('contents')

<div class="container-fluid">
    <div class="row">
    <div class="col-lg-8"> 
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Suivi de paiement du devis {{ $paiement->devis->ref }}</h1>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover" >
        <thead class="table-primary">
            <tr>
                <th>Total à payer</th>
                <th>Paiement effectué</th>
                <th>Reste à payer</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody >
            @if($paiement->count() > 0)
                    <tr>
                        <td class="align-middle">{{ number_format($paiement->final,2, ',',' ') }}</td>  
                        <td class="align-middle">{{ number_format($paiement->paiementEffectue,2, ',',' ') }}</td>  
                        <td class="align-middle"><b>{{ number_format($paiement->reste,2, ',',' ') }} </b></td>  
                        <td class="align-middle">{{ number_format($paiement->pourcentage,2, ',',' ') }} %</td>  
                    </tr>
            @else
                <tr>
                    <td class="text-center" colspan="5">Aucun paiement effectué</td>
                </tr>
            @endif
        </tbody>
    </table>
    <hr><br><br>    
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
            @if($listPaiement->count() > 0)
                @foreach($listPaiement as $lp)
                    <tr>
                        <td class="align-middle">{{ $lp->ref }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($lp->date)->format('d-m-Y H:i') }}</td>
                        <td class="align-middle" style="text-align: right">{{ number_format($lp->montant,2, ',',' ') }}</td>  
                        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Aucun paiement</td>
                </tr>
            @endif
        </tbody>
    </table>
    </div>
    <div  class="col-lg-1"></div>
    <div class="col-lg-3"> 

    <form action="{{ route('paiement.store') }}" method="POST">
        @csrf
        <h3 class="mb-0">Nouveau paiement</h3>
        <br>
        <input type="hidden" name="devis_id" value="{{ $paiement->devis_id }}">
        <div class="form-group font-weight-bold text-gray-800">
            <label for="date_debut" >Date de paiement</label>
            <input type="datetime-local" id="date_debut" name="datepaiement" class="form-control" required>
        </div>
        <div class="form-group font-weight-bold text-gray-800">
            <label >Montant (Ar)</label>
            {{-- <input type="number" name="montant" id="" class="form-control" > --}}
            <input type="number" name="montant" id="" class="form-control" min="0" max="{{ $paiement->reste }}">
        </div>
        <button type="submit" class="btn btn-primary">Soumettre</button>
    </form>
    </div>
    </div>
</div>
{{-- 
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Événement de soumission du formulaire
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault(); // Empêcher la soumission normale du formulaire

            // Récupérer le montant total du paiement depuis le champ de formulaire
            var montantPaiement = parseFloat(document.querySelector('input[name="montant"]').value);

            // Récupérer le montant restant à payer depuis le backend (par exemple, via une variable PHP dans votre vue Blade)
            var montantRestant = parseFloat({{ $paiement->reste }});

            // Vérifier si le montant total du paiement dépasse le montant restant à payer sur le devis
            if (montantPaiement > montantRestant) {
                // Afficher un message d'erreur
                alert("Le montant total du paiement ne peut pas dépasser le montant restant à payer sur le devis.");
            } else {
                // Soumettre le formulaire normalement
                this.submit();
            }
        });
    });
</script> --}}

@endsection