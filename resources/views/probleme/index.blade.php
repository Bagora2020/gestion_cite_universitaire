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
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">&nbsp;</label>
                        <button type="submit" class="btn btn-danger w-100">Filtrer</button>
                    </div>
                </div>
            </form>

            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col"># Série</th>
                        <th scope="col">Pavillon</th>
                        <th scope="col">N° Chambre</th>
                        <th scope="col" class="text text-center">Objet</th>
                        @can('mis-a-jours')
                            <th scope="col">Statut</th>
                        @endcan
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($probleme as $index => $problemes)
                        <tr>
                            <td class="text-center">{{$problemes->numSerie}}</td>
                            <td class="text text-center">{{$problemes->pavillon->NomPav}}</td>
                            <td class="text text-center">{{$problemes->NumChambre}}</td>
                            <td class="text text-center">{{$problemes->Objet}}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input type="checkbox" 
                                           class="form-check-input etat-switch" 
                                           data-id="{{ $problemes->id }}" 
                                           {{ $problemes->etat ? 'checked' : '' }}
                                           id="etat{{ $problemes->id }}"
                                           data-objet="{{ $problemes->Objet }}" 
                                           data-numserie="{{ $problemes->numSerie }}"
                                           style="width: 30px; height: 19px; cursor: pointer;"
                                           data-bs-toggle="modal" 
                                           data-bs-target="#interventionModal{{ $problemes->id }}">
                                    <label class="form-check-label" for="etat{{ $problemes->id }}">
                                        {{ $problemes->etat ? 'Résolu' : 'Non Résolu' }}
                                    </label>
                                </div>

                                <div class="modal fade" id="interventionModal{{ $problemes->id }}" tabindex="-1" aria-labelledby="interventionModalLabel{{ $problemes->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="interventionModalLabel{{ $problemes->id }}">Remplir la fiche d'intervention</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('ficheintervention.add') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="probleme_id" value="{{ $problemes->id }}">

                                                    <div class="row mb-3">
                                                        <div class="col-12 col-md-6">
                                                            <label for="objetField" class="form-label">Objet</label>
                                                            <input type="text" class="form-control" id="objetField" name="objet" value="{{$problemes->Objet}}" readonly>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="numSerieField" class="form-label">Numéro de Série</label>
                                                            <input type="text" class="form-control" id="numSerieField" name="numSerie" value="{{$problemes->numSerie}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col-12 col-md-6">
                                                            <label for="lieuField" class="form-label">Lieu</label>
                                                            <input type="text" class="form-control" id="lieuField" name="lieu" value="{{$problemes->pavillon->NomPav}}" readonly>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="nom" class="form-label">Nom de l'ouvrier</label>
                                                            <input type="text" class="form-control" id="nom" name="nom" required>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="Secteur" class="form-label">Secteur de l'ouvrier</label>
                                                        <input type="text" class="form-control" id="Secteur" name="Secteur" required>
                                                    </div>

                                                    <div class="container">
                                                        @livewire('dynamic-inputs')
                                                    </div>

                                                    <div id="formfield">
                                                        <div class="row mb-3">
                                                            <div class="col-12 col-md-5">
                                                                <label for="matieres" class="form-label">Matières</label>
                                                                <input type="text" class="form-control" id="add" name="matieres" placeholder="Matières" required>
                                                            </div>
                                                            <div class="col-12 col-md-5">
                                                                <label for="quantite" class="form-label">Quantité</label>
                                                                <input type="text" class="form-control" id="add" name="quantite" placeholder="Quantité" required>
                                                            </div>
                                                            <div class="col-12 col-md-2 d-flex align-items-end">
                                                                <button class="add" onclick="add()">
                                                                    <i class="fa fa-plus-circle"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="observation" class="form-label">Observation</label>
                                                        <input type="text" class="form-control" id="observation" name="observation" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-success">Enregistrer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-danger">
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                        @can('edit-users')
                                            <a href="{{route ('pdf.FicheInterventionPDF', $problemes->id)}}"><button class="btn btn-success">
                                                <i class="fa fa-print" aria-hidden="true"></i>
                                            </button></a>
                                        @endcan
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>

@endsection
