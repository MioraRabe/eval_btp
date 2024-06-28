@extends('layouts.app')

@section('contents')
    <h1>Modifier le Type de Finition {{ $typefinition->nom }}</h1>

    <form action="{{ route('typefinitions.update', ['id' => $typefinition->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $typefinition->nom }}">
        </div>

        <div class="form-group">
            <label for="augmentation">Augmentation :</label>
            <input type="number" step="0.01" class="form-control" id="augmentation" name="augmentation" value="{{ $typefinition->augmentation }}">
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
