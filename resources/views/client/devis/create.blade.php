@extends('client.layouts.app')

@section('contents')
<form action="{{ route('devis.store') }}" method="POST">
    @csrf

    <div class="row">
        <!-- type maison -->
        @foreach ($typemaisons as $typemaison)
        <div class="col-xl-3 col-md-6 mb-4" >
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <input type="radio" name="typemaison_id" value="{{ $typemaison->id }}" id="typemaison_{{ $typemaison->id }}" required>
                    <label for="typemaison_{{ $typemaison->id }}">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            <h6>{{ $typemaison->nom }}</h6>
                        </div>
                        <p class="card-text text-lowercase">{{ $typemaison->description }}</p>
                        <div class="text-xs">
                            <i class="fas fa-calendar fa-1x text-gray-300"></i> {{ $typemaison->duree }} jours
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Ar {{ number_format($typemaison->vue_typemaison_montant->total,0, ',',' ') }}</div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="h5 mb-0 font-weight-bold text-gray-800">Types de finition</div>
        <!-- Type finition -->
        @foreach ($typefinitions as $typefinition)
        <div class="col" >
            <input type="radio" name="typefinition_id" value="{{ $typefinition->id }}" id="typefinition_{{ $typefinition->id }}" required>
            <label for="typefinition_{{ $typefinition->id }}">{{ $typefinition->nom }} ( + {{ $typefinition->augmentation }}%)</label>
        </div>
        @endforeach
    </div>

    <!-- Date de début des travaux -->
    <div class="form-group col-xl-3 col-md-6 mb-4 font-weight-bold text-gray-800">
        <label for="date_debut" >Date de début des travaux :</label>
        <input type="datetime-local" id="date_debut" name="datedebuttravaux" class="form-control" required>
    </div>

    <!-- Lieu -->
    <div class="form-group col-xl-3 col-md-6 mb-4 font-weight-bold text-gray-800">
        <label for="lieu">Lieu :</label>
        <input type="text" id="lieu" name="lieu" class="form-control" required>
    </div>

    <!-- Bouton de soumission -->
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

@endsection
















@section('content')
<div class="row">

    @foreach ($typemaisons as $typemaison)
        <div class="col-xl-3 col-md-6 mb-4" style="text-align: center">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">
                               <h6> {{ $typemaison->nom }}</h6>
                                <p class="card-text text-lowercase">
                                    {{ $typemaison->description }}<br><br>
                                </p>
                            </div>

                            <div class="text-xs">
                                <i class="fas fa-calendar fa-1x text-gray-300"></i>
                                {{ $typemaison->duree }} jours
                                {{-- <span class="col-auto"><i class="fa-solid fa-location-dot"></i>{{ $typemaison->salle->nom }}</span><br> --}}

                                <div class="h5 mb-0 font-weight-bold text-gray-800">$ 100 000
                                    {{-- {{ $typemaison->montant }}  --}}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-auto">
                            <a href="{{ route('typemaisons.show', $typemaison->id) }}"><i class="fas fa-calendar fa-2x "></i></a>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    

        <input type="radio" name="typefinition" id="">
    </div>

@endsection