@extends('layouts.app')

@section('contents')
    <h1>Liste des Types de Finition</h1>
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Augmentation</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($typefinitions as $typeFinition)
                <tr>
                    <td>{{ $typeFinition->id }}</td>
                    <td>{{ $typeFinition->nom }}</td>
                    <td style="text-align: right">{{ $typeFinition->augmentation }}</td>
                    <td>
                        <a href="{{ route('typefinitions.show', ['id' => $typeFinition->id]) }}" class="btn btn-primary">Voir</a>
                        <a href="{{ route('typefinitions.edit', ['id' => $typeFinition->id]) }}" class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
