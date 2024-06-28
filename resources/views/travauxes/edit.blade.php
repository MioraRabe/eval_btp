@extends('layouts.app')

@section('contents')
    <div class="container">
        <h2>Modifier le Travail</h2>
        <form action="{{ route('travauxes.update', $travail->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code:</label>
                <input type="text" name="code" value="{{ $travail->code }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" value="{{ $travail->nom }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="unite_id">Unité:</label>
                <select name="unite_id" class="form-control">
                    @foreach($unites as $unite)
                        <option value="{{ $unite->id }}" {{ $travail->unite_id == $unite->id ? 'selected' : '' }}>
                            {{ $unite->nom }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pu">Prix unitaire:</label>
                <input type="text" name="pu" min="0" value="{{ $travail->pu }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="{{ route('travauxes.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
