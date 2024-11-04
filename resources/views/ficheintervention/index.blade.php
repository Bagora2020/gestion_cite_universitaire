@extends('layouts.apps')
@section('content')

<div class="container mx-auto p-3">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h1 class="h2">Enregistrer une fiche d'intervention</h1>
            <a href="{{ url()->previous() }}" class="btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i> Retour
            </a>
        </div>

        <div class="card-body">
            <a href="{{ route('ficheintervention.create') }}" class="btn btn-success mb-3">
                <i class="bi bi-folder-plus"></i> Ajouter Fiche
            </a>

            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Numéro de Série</th>
                        <th>Nature</th>
                        <th>Matières</th>
                        <th>Quantité</th>
                        <th>Lieu d'intervention</th>
                        <th>Observation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fiches as $fiche)
                        <tr>
                            <td>{{ $fiche->numSerie }}</td>
                            <td>{{ $fiche->objet }}</td>
                            <td>{{ $fiche->matieres }}</td>
                            <td>{{ $fiche->quantite }}</td>
                            <td>{{ $fiche->lieu }} </td>
                            <td>{{ $fiche->observation }}</td>
                            <td>
                                <a href="{{ route('ficheintervention.edit', $fiche->id) }}" class="btn btn-warning">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                                
                                <a href="{{ route('pdf.FicheInterventionPDF', $fiche->numSerie) }}" class="btn btn-success">
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </a>

                                <form action="{{ route('ficheintervention.destroy', $fiche->numSerie) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette fiche ?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
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
