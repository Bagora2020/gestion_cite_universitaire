@extends('layouts.apps')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Liste des étudiants</h2>
    
    <button class="btn btn-success mb-3">Ajouter</button>
    
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Diallo</td>
                <td>Awa</td>
                <td>Licence 3</td>
                <td>
                    <button class="btn btn-primary btn-sm">Modifier</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                    <button class="btn btn-secondary btn-sm">Imprimer</button>
                </td>
            </tr>
            <tr>
                <td>Fall</td>
                <td>Mamadou</td>
                <td>Master 2</td>
                <td>
                    <button class="btn btn-primary btn-sm">Modifier</button>
                    <button class="btn btn-danger btn-sm">Supprimer</button>
                    <button class="btn btn-secondary btn-sm">Imprimer</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
