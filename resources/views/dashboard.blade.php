@extends('layouts.app')
  
  
@section('contents')

<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                          Montant total des devis</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Ar {{ number_format($totalDevis,2, ',',' ') }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Total des paiements effectués</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Ar {{ number_format($eff,2, ',',' ') }}</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Earnings (Monthly) Card Example -->
  {{-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                      </div>
                      <div class="row no-gutters align-items-center">
                          <div class="col-auto">
                              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                          </div>
                          <div class="col">
                              <div class="progress progress-sm mr-2">
                                  <div class="progress-bar bg-info" role="progressbar"
                                      style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                      aria-valuemax="100"></div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}

  <!-- Pending Requests Card Example -->
  {{-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                          Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                  </div>
                  <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                  </div>
              </div>
          </div>
      </div>
  </div> --}}
</div>

<h2>Montant des devis par mois pour l'année sélectionnée</h2>

    <form action="{{ route('MontantParMois') }}" method="GET">
        <label for="annee">Choisir une année :</label>
        <select name="annee" id="annee">
            @foreach ($annees as $annee)
                <option value="{{ $annee->annee }}">{{ $annee->annee }}</option>
            @endforeach
        </select>
        <button type="submit">Afficher</button>
    </form>
@php
    $moisArray = [
        1 => 'Janvier',
        2 => 'Février',
        3 => 'Mars',
        4 => 'Avril',
        5 => 'Mai',
        6 => 'Juin',
        7 => 'Juillet',
        8 => 'Août',
        9 => 'Septembre',
        10 => 'Octobre',
        11 => 'Novembre',
        12 => 'Décembre'
    ];
@endphp
    <br><br>
    @if (isset( $montantsParMois))
        <h4>Montants par mois pour l'année {{ $montantsParMois[0]->annee }}</h4>
        <table>
            <thead>
                <tr>
                    <th width='100'>Mois</th>
                    <th>Montant total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($montantsParMois as $montant)
                    <tr>
                        {{-- <td>{{ $montant->mois }}</td> --}}
                        {{-- <td>{{ date('F', mktime(0, 0, 0, $montant->mois, 1)) }}</td> --}}
                        <td>{{ $moisArray[$montant->mois] }}</td>
                        <td>AR {{ number_format($montant->montant_total,2, ',',' ') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

{{--         
        $labels = $films->pluck('nom')->toArray();
        $data = $films->pluck('billets_count')->toArray(); --}}

        {{-- <div id="chart"></div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
    // import ApexCharts from 'apexcharts'
    var options = {
        chart: {
            type: 'bar',
        },
        series: [{
            name: 'Montant devis',
            data: @json($montantsParMois->pluck('mois')->toArray()),
        }],
        xaxis: {
            categories: @json($montantsParMois->pluck('montant_total')->toArray()),
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();      
    </script> --}}
{{-- --------------------------------------------------------------
    <div id="chart"></div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        chart: {
            type: 'bar',
        },
        series: [{
            name: 'Montant devis',
            data: @json($montantsParMois->pluck('montant_total')->toArray()),
        }],
        xaxis: {
            categories: @json($montantsParMois->pluck('mois')->toArray()),
        },
        yaxis: {
            title: {
                text: 'Montant Total (AR)'
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "AR " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();      
</script>
--------------------------------------------------- --}}


<div id="chart"></div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        chart: {
            type: 'bar',
        },
        series: [{
            name: 'Montant devis',
            data: @json($montantsParMois->pluck('montant_total')->toArray()),
        }],
        xaxis: {
            categories: [
                @foreach ($montantsParMois as $montant)
                    '{{ $moisArray[$montant->mois] }}',
                @endforeach
            ],
        },
        yaxis: {
            title: {
                text: 'Montant Total (AR)'
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "AR " + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);

    chart.render();      
</script>

    @endif


    {{-- <script src="{{ asset('admin_assets/vendor/chart.js/Chart.min.js') }}"></script> --}}
    
@endsection