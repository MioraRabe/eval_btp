@extends('client.layouts.app')

@section('contents')

<div class="container-fluid">

    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Vos devis</h1>
        <a href="{{ route('devis.create') }}" class="btn btn-primary">Nouveau devis</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>Date (devis)</th>
                <th>Type maison</th>
                <th>Type finition</th>
                <th>Date debut travaux</th>
                <th>Montant (Ar)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($devis->count() > 0)
                @foreach($devis as $dv)
                    <tr>
                        <td class="align-middle">{{ $dv->ref }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($dv->datecreation )->format('d-m-Y H:i') }}</td>
                        <td class="align-middle">{{ $dv->typemaison->nom }}</td>
                        <td class="align-middle">{{ $dv->typefinition->nom }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($dv->datedebuttravaux )->format('d-m-Y H:i') }}</td>
                        <td class="align-middle">{{ number_format($dv->vue_devis_montant->final,2, ',',' ') }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('devis.paiement', $dv->id) }}" type="button" class="btn btn-secondary">Paiement</a>
                                <a href="{{ route('devis.pdf', $dv->id)}}" type="button" class="btn btn-warning">Export Pdf</a>
                                {{-- <form action="{{ route('products.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form> --}}
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Aucun devis</td>
                </tr>
            @endif
        </tbody>
    </table>
    
@endsection