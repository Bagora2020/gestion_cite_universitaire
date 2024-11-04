@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrer Un pavillon</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{route('pavillon.create')}}" class="btn btn-success">
                Ajouter Pavillon
                <i class="bi bi-folder-plus"></i>
            </a>
    
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Pavillon</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pavillon as $pavillons)
            <tr>
                <td>{{ $pavillons->id }}</td>
                <td>{{ $pavillons->NomPav }}</td>
              
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
                
                    <a href="{{route('pavillon.edit', $pavillons->id)}}"><button class="btn btn-primary">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </button></a>
               
                    <form method="POST" action="{{route('pavillon.destroy', $pavillons->id)}}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button></a>
                    </form>

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