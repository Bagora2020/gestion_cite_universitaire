@extends('layouts.apps')
@section('content')


<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Liste des utilisateurs et leurs rôles</h1>
            <div>
                <a href="#" class="btn btn-success me-2">
                    <i class="bi bi-plus-circle"></i> Ajouter user
                </a>
                <a href="/dashboard" class="btn btn-danger">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Email</th>
                            <th scope="col">Rôles</th>
                            <th scope="col">Statut</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                            <td>
                                @if($user->status)
                                    <span class="badge bg-success">Actif</span>
                                @else
                                    <span class="badge bg-danger">Inactif</span>
                                @endif
                                <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm {{ $user->status ? 'btn-danger' : 'btn-success' }}">
                                        {{ $user->status ? 'Désactiver' : 'Activer' }}
                                    </button>
                                </form>
                            </td>
                            <td>
                                @can('edit-users')
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                @endcan

                                @can('delete-users')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
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
</div>



@endsection