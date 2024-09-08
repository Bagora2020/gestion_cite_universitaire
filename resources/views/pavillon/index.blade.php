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
    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
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
                
                    <a href="{{route('pavillon.edit', $pavillons->id)}}"><button class="btn btn-primary">Editer</button></a>
               
                    <form method="POST" action="{{route('pavillon.destroy', $pavillons->id)}}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');" class="d-inline">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger">supprimer</button></a>
                    </form>

                    
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        </div>
    </div>
</div>
@endsection