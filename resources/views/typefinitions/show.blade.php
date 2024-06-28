@extends('layouts.app')

@section('contents')
    <h1>Détails du Type de Finition {{ $typefinition->nom }}</h1>

    <ul>
        <li><strong>ID :</strong> {{ $typefinition->id }}</li>
        <li><strong>Nom :</strong> {{ $typefinition->nom }}</li>
        <li><strong>Augmentation :</strong> {{ $typefinition->augmentation }}</li>
    </ul>

    <a href="{{ route('typefinitions.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection
