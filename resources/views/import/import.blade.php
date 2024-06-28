@extends('layouts.app')

@section('contents')

<form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label for="maisontravaux">Fichier des Maisons et Travaux (CSV)</label>
            <input class="form-control-file" type="file" name="maisontravaux" id="maisontravaux" accept=".csv">
        </div>
        <div class="col-md-6">
            <label for="devis">Fichier des Devis (CSV)</label>
            <input class="form-control-file" type="file" name="devis" id="devis" accept=".csv">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <button type="submit" class="btn btn-primary">Importer CSV</button>
        </div>
    </div>
</form>


@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    {{Session::put('success', null)}}

@endif

@endsection
