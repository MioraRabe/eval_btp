@extends('layouts.app')

@section('contents')
    <div class="container">
        <h2>Liste des Travaux</h2>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
        {{-- <a href="{{ route('travauxes.create') }}" class="btn btn-primary">Ajouter un travail</a> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Nom</th>
                    <th>Unité</th>
                    <th>Prix unitaire</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($travauxes as $travail)
                <tr>
                    <td>{{ $travail->code }}</td>
                    <td>{{ $travail->nom }}</td>
                    <td>{{ $travail->unite->nom }}</td>
                    <td style="text-align: right">{{ $travail->pu }}</td>
                    <td>
                        <a href="{{ route('travauxes.edit', $travail->id) }}" class="btn btn-primary">Modifier</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
