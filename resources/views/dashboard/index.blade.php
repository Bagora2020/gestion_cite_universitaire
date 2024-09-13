@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
  <div class="card p-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Tableau de Bord || {{now()->year}}</h1>

      <form action="#" method="get" class="d-flex gap-2 ">
        @csrf


        <select id="yearSelect" onchange="afficherAnnee()" name="date" class="form-control">
          <script>
            var currentYear = new Date().getFullYear();
            var selectOptions = '';
            for (var year = currentYear; year >= 2022; year--) {
              selectOptions += '<option value="' + year + '">' + year + '</option>';
            }
            document.write(selectOptions);
          </script>
        </select>

        <button type="submit" value="" class="btn btn-primary">
          <i class="bi bi-filter"></i>
        </button>

      </form>

      


      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
      </ol>
    </div>

    <div class="container">
      <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100 p-3">
            <div class="card-body">
              <div class="row align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Nombre de problèmes</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProblemes }}</div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> </span>
                    <span>Nombre de problèmes</span>
                  </div>
                </div>
                <div class="icon-circle bg-danger" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                   <i class="fas fa-exclamation-triangle text-white" style="font-size: 15px;"></i>
                 </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100 p-3">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Problèmes <br> Résolus</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $problemesResolus }}</div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> </span>
                    <span>Problèmes Résolus</span>
                  </div>
                </div>
                 <div class="icon-circle bg-success" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                   <i class="fas fa-exclamation-triangle text-white" style="font-size: 15px;"></i>
                 </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100 p-3">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">Problèmes non-Résolus</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $problemesNonResolus }}</div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> </span>
                    <span>Problème non-Résolus</span>
                  </div>
                </div>
                <div class="icon-circle bg-warning" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                   <i class="fas fa-exclamation-triangle text-white" style="font-size: 15px;"></i>
                 </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card h-100 p-3">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-uppercase mb-1">NOMBRE DE <br>FACTURE</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$totalfactures}}</div>
                  <div class="mt-2 mb-0 text-muted text-xs">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> </span>
                    <span>Nombre de Factures</span>
                  </div>
                </div>
                  <div class="icon-circle bg-primary" style="width: 30px; height: 30px; display: flex; justify-content: center; align-items: center; margin-right: 10px;">
                    <i class="fa fa-inbox text-white" aria-hidden="true"></i>
                  </div>
              </div>
            </div>
          </div>
        </div>


        <style>
    .chart-container {
        position: relative;
        width: 50%; /* Ajuste la largeur ici */
        height: 300px; /* Ajuste la hauteur ici */
        display: flex; /* Utilise Flexbox */
        flex-direction: column; /* Dispose les éléments en colonne */
        justify-content: center; /* Centre verticalement */
        align-items: center; /* Centre horizontalement */
        text-align: center; /* Centre le texte */
    }

    #problemesPavillonChart {
        width: 30% !important; /* Assure que le graphique prend toute la largeur du conteneur */
        height: 70% !important; /* Assure que le graphique prend toute la hauteur du conteneur */
    }
</style>

<div class="chart-container">
    <h3>Problèmes signalés par pavillon</h3>
    <canvas id="problemesPavillonChart"></canvas>
</div>

<script>
    var ctx = document.getElementById('problemesPavillonChart').getContext('2d');
    var problemesPavillonChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($pavillons = ['Pavillon A', 'Pavillon B', 'Pavillon C', 'Pavillon D']) !!},  // Labels des pavillons
            datasets: [{
                label: 'Problèmes signalés',
                data: {!! json_encode($totaux) !!},  // Données des totaux des problèmes
                backgroundColor: [
                    'rgba(255, 99, 132, 0.7)',  // Rouge
                    'rgba(54, 162, 235, 0.7)',  // Bleu
                    'rgba(255, 206, 86, 0.7)',  // Jaune
                    'rgba(75, 192, 192, 0.7)',  // Vert
                    'rgba(153, 102, 255, 0.7)', // Violet
                    'rgba(255, 159, 64, 0.7)'   // Orange
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,  // Active la légende
                    position: 'bottom',  // Positionne la légende en bas
                    labels: {
                        boxWidth: 20,   // Taille de la boîte de couleur
                        padding: 15,    // Espace entre les éléments de la légende
                        color: 'black',  // Couleur du texte
                        usePointStyle: true // Utilise des points colorés au lieu de carrés
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>





        </div>
    </div>
</div>
</div>
@endsection
