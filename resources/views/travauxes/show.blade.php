@extends('layouts.app')

@section('contents')
    <div class="container">
        <h2>Détails du Travail</h2>
        <div>
            <p><strong>Code:</strong> {{ $travail->code }}</p>
            <p><strong>Nom:</strong> {{ $travail->nom }}</p>
            <p><strong>Unité:</strong> {{ $travail->unite->nom }}</p>
            <p><strong>Prix unitaire:</strong> {{ $travail->pu }}</p>
        </div>
        <a href="{{ route('travauxes.index') }}" class="btn btn-primary">Retour à la liste</a>
    </div>
@endsection
