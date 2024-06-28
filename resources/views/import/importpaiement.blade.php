@extends('layouts.app')

@section('contents')

<form action="{{ route('import.storePaiement') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="paiement" accept=".csv" placeholder="paiement">
    <button type="submit">Importer CSV</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    {{Session::put('success', null)}}

@endif

@endsection
