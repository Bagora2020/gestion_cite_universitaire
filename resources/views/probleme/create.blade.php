@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrement un problème</h1>
            <a href="{{ url()->previous() }}" class=" float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>

        </div>

        <div class="col-md-8 m-auto text-center mt-3">
            <img class="img-fluid" src="" alt=""
            srcset="/img/fiches.jpg" width="200px" height="180px">
        </div>

        @if (session('success'))
        <div class="alert alert-primary text-dark">
            {{ session('success') }}
        </div>
        @endif




        <div class="card-body">
            <form action="{{route('probleme.add')}}" class="p-3" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="pavillon_NomPav">Pavillon</label>
                        <select name="pavillon_NomPav" class="form-control" id="pavillon_NomPav">
                            <option value="">Sélectionnez un pavillon</option>
                            @foreach($pavillon as $pavillons)
                            <option value="{{ $pavillons->id }}">{{ $pavillons->NomPav }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Appartement</label>
                        <input type="number" name="Appartement" class="form-control" placeholder="Appartement">
                    </div>
                   

                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">N° Chambre</label>
                        <input type="number" name="NumChambre" class="form-control" placeholder="N° Chambre">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Objet</label>
                        <input type="text" name="Objet" class="form-control" placeholder="Objet">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">images</label>
                        <input type="file" name="images[]" id="images" class="form-control" multiple>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">message</label>
                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Entrez votre message ici..."></textarea>

                    </div>
                </div>

                
                <div class="row mb-3">
                    <div class="col-offset-4">
                        <button class="btn-success btn" type="submit">Enregistrer</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
</div>

@endsection