@extends('layouts.apps')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Ajouter un utilisateur</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="name" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                     </div>
                    <div class="col-12 col-md-6">
                        <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    </div>
                </div>


                        @if($roles->isNotEmpty())
                        <div class="mb-3">
                            <label for="roles" class="form-label">Rôles</label>
                            <select class="form-control" id="roles" name="roles[]" multiple>
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-plus-circle"></i> Ajouter</button>
                            <button type="button" class="btn btn-danger px-4" onclick="history.back()">
                                <i class="bi bi-arrow-left"></i> Retour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection