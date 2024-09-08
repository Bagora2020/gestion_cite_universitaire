    @extends('layouts.apps')
    @section('content')


    <div class="mx-auto container p-3">
    <div class="card">
    <div class="card-header d-flex align-content-center justify-content-between">
    <h1 class="h2">Enregistrer un probleme</h1>
    <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
    <i class="bi bi-arrow-90deg-left"></i>
    Retour
    </a>
    </div>

    <div class="card-body">
    <a href="{{route('probleme.create')}}" class="btn btn-success">
    Ajouter Problème
    <i class="bi bi-folder-plus"></i>
    </a>

    <form action="{{ route('probleme.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Date de début</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Date de fin</label>
                <input type="date" id="end_date" name="end_date" class="form-control"  value="{{ request('end_date') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label">&nbsp;</label>
                <button type="submit" class="btn btn-primary w-100">Filtrer</button>
            </div>
        </div>
    </form>


    <table id="example" class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pavillon</th>
            <th scope="col">Appartement</th>
            
            <th scope="col">N° Chambre</th>
            
            <th scope="col">Objet</th>
            <th scope="col">Create at</th>
            <th scope="col">Statut</th>
            
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($probleme as $problemes)
        <tr>
            <th scope="row">{{$problemes->id}}</th>
            <td>{{$problemes->pavillon->NomPav}}</td>
            
            <td>{{$problemes->Appartement}}</td>
            <td>{{$problemes->NumChambre}}</td>
            
            <td>{{$problemes->Objet}}</td>
            <td>{{ $problemes->created_at->format('Y-m-d') }}</td>
            <td>
            
            <div class="form-check form-switch">
                <input type="checkbox" 
                    class="form-check-input etat-switch" 
                    data-id="{{ $problemes->id }}" 
                    {{ $problemes->etat ? 'checked' : '' }}
                    id="etat{{ $problemes->id }}"
                    style="width: 30px; height: 19px; cursor: pointer;">
                <label class="form-check-label" for="etat{{ $problemes->id }}">
                    {{ $problemes->etat ? 'Résolu' : 'Non Résolu' }}
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
            <td>

                    <div class="btn-group mb-1">
                    <button type="button" class="btn btn-primary">Info</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                    @can('edit-users')
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#showModal{{$problemes->id}}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                    </button> 
                    @endcan
                    @can('edit-users')
                            <a href="{{route('probleme.edit', $problemes->id)}}"><button class="btn btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button></a>
                            @endcan

                            @can('edit-users')
                            <a href="{{route ('pdf.bontravail', $problemes->id)}}"><button class="btn btn-success">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                </button></a>
                            @endcan

                            @can('delete-users')
                            <form action="{{route('probleme.destroy', $problemes->id)}}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                            @endcan
            </td>
        </div>
        </div>      
        </tr>

        
        <div class="modal fade" id="showModal{{$problemes->id}}" tabindex="-1" aria-labelledby="showModalLabel{{$problemes->id}}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showModalLabel{{$problemes->id}}">Détails du Problème</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Pavillon :</strong> {{$problemes->pavillon->NomPav}}</p>
                        <p><strong>Appartement :</strong> {{$problemes->Appartement}}</p>
                        <p><strong>Objet :</strong> {{$problemes->Objet}}</p>
                        <p><strong>Message :</strong> {{$problemes->message}}</p>
                        <p><strong>Date :</strong>{{ $problemes->created_at->format('Y-m-d') }}</p>

                        @if($problemes->images)
                            @foreach(json_decode($problemes->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Image du problème" class="img-fluid" style="max-width: 100px; max-height: 100px; margin: 5px;">
                            @endforeach
                        @else
                            <p>Aucune image disponible</p>
                        @endif
                                                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>




        
        @endforeach
    </tbody>
    </table>
    </div>
    </div>
    </div>



    @endsection
