@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
  <div class="card p-3">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Tableau de Bord || {{now()->year}}</h1>

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

        <div class="table-responsive">
        <table class="table">
    <thead>
        <tr>
            <th>Appartement</th>
            <th>Numéro de Chambre</th>
            <th>Objet</th>
            <th scope="col">Statut</th>
            <th>Date de Soumission</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($derniersProblemes as $probleme)
            <tr>
                <td>{{ $probleme->Appartement }}</td>
                <td>{{ $probleme->NumChambre }}</td>
                <td>{{ $probleme->Objet }}</td>


                <td>
        
        <div class="form-check form-switch ">
            <input type="checkbox" 
                class="form-check-input etat-switch" 
                data-id="{{ $probleme->id }}" 
                {{ $probleme->etat ? 'checked' : '' }}
                id="etat{{ $probleme->id }}"
                style="width: 30px; height: 19px; cursor: pointer;">
            <label class="form-check-label" for="etat{{ $probleme->id }}">
                {{ $probleme->etat ? 'Résolu' : 'Non Résolu' }}
            </label>
        </div>
  
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
// Initialisation de la couleur de fond selon l'état actuel
$('.etat-switch').each(function() {
$(this).css('background', $(this).prop('checked') ? 'green' : 'red');
});

// Écouter le changement de l'état lors du glissement
$('.etat-switch').on('change', function() {
var etat = $(this).prop('checked') ? 1 : 0; // Récupère l'état (résolu ou non résolu)
var id = $(this).data('id'); // Récupère l'ID du problème
var toggle = $(this); // Référence au toggle switch

// Changer immédiatement la couleur de fond en fonction de l'état
toggle.css('background', etat === 1 ? 'green' : 'red');

// Requête AJAX pour mettre à jour le statut dans la base de données
$.ajax({
url: '{{ route('probleme.update.etat') }}', // Route pour mettre à jour l'état
type: 'POST',
data: {
    _token: '{{ csrf_token() }}',
    etat: etat,
    id: id
},
success: function(response) {
    if (response.success) {
        // Met à jour le label avec le texte approprié
        toggle.next('label').text(etat === 1 ? 'Résolu' : 'Non Résolu');
    } else {
        alert('Erreur lors de la mise à jour');
    }
},
error: function(xhr) {
    alert('Erreur lors de la mise à jour du statut');
}
});
});
});
</script>

        </td>


                <td>{{ $probleme->created_at->format('d/m/Y H:i') }}</td>

                <td>

<div class="btn-group mb-1">
       <button type="button" class="btn btn-danger">
           <i class="fa fa-cog" aria-hidden="true"></i>
       </button>
       <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split"
       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <span class="sr-only">Toggle Dropdown</span>
       </button>
   <div class="dropdown-menu">
           @can('edit-users')
           <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showModal{{$probleme->id}}">
                   <i class="fa fa-eye" aria-hidden="true"></i>
           </button> 
           @endcan
           @can('edit-users')
                   <a href="{{route('probleme.edit', $probleme->id)}}"><button class="btn btn-warning">
                       <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                       </button></a>
                   @endcan

                   @can('edit-users')
                   <a href="{{route ('pdf.bontravail', $probleme->id)}}"><button class="btn btn-success">
                       <i class="fa fa-print" aria-hidden="true"></i>
                       </button></a>
                   @endcan

                   @can('delete-users')
                   <form action="{{route('probleme.destroy', $probleme->id)}}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="d-inline">
                       @csrf
                       @method('DELETE')
                       <button type="submit" class="btn btn-danger">
                           <i class="fa fa-trash-o" aria-hidden="true"></i>
                       </button>
                   </form>
                   @endcan

           </div>
       </div>
</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Aucun problème soumis récemment.</td>
            </tr>

        
        @endforelse
    </tbody>
</table>
</div>




        </div>
    </div>
</div>
</div>
@endsection
