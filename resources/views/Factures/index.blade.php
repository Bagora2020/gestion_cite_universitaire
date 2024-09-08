@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrer une facture</h1>
            <a href="{{ url()->previous() }}" class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>
        </div>

       

        <div class="card-body">
            <a href="{{route('Factures.create')}}" class="btn btn-success">
                Ajouter Facture
                <i class="bi bi-folder-plus"></i>
            </a>
    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Libellé</th>
                <th>Factures</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($facture as $factures)
       
            <tr>
            <td>{{ $factures->id }}</td>
            <td>{{ $factures->nom_facture }}</td> 
            <td>
            @if($factures->chemin_facture)
                @foreach(json_decode($factures->chemin_facture) as $document)
                    <a href="{{ asset('storage/' . $document) }}" target="_blank">Télécharger {{ $loop->iteration }}</a><br>
                @endforeach
            @endif
            </td>
                <td>
                    <a href="{{ route('Factures.edit', $factures->id) }}"><button class="btn btn-primary">Editer</button></a>
               
                    <form method="POST" action="{{ route('Factures.destroy', $factures->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');" class="d-inline">
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