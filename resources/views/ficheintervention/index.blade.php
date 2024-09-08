@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrer une fiche d'intervention</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('ficheintervention.create')}}" class="btn btn-success">
                Ajouter Fiche
                <i class="bi bi-folder-plus"></i>
            </a>
    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nature des traveaux</th>
                <th>Quantité Matières Consommables</th>
                <th>Lieu d'intervention</th>
                <th>Observation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fiche as $fiches)
            <tr>
                <td>{{ $fiches->id }}</td>
                <td>{{ $fiches->nature }}</td>
                <td>{{ $fiches->quantite }}</td>
                <td>{{ $fiches->lieu }} </td>
                <td>{{ $fiches->observation }}</td>
               
              
                <td>
                
                <div class="btn-group mb-1">
                    <button type="button" class="btn btn-primary">Info</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                    
                    @can('edit-users')
                            <a href="{{route ('ficheintervention.edit', $fiches->id) }}"><button class="btn btn-warning">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button></a>
                            @endcan

                            @can('edit-users')
                            <a href="#"><button class="btn btn-success">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                </button></a>
                            @endcan

                            @can('delete-users')
                            <form action="{{route ('ficheintervention.destroy', $fiches->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                            @endcan
                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection