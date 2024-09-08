@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Enregistrer une fiche</h1>
            <a href="{{ url()->previous() }}" class=" float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>

        </div>

        <div class="col-md-8 m-auto text-center mt-3">
            <img class="img-fluid" src="" alt=""
            srcset="/img/fiche.jpg" width="200px" height="180px">
        </div>

        @if (session('success'))
        <div class="alert alert-primary text-dark">
            {{ session('success') }}
        </div>
        @endif




        <div class="card-body">
            <form action="{{route('ficheintervention.add')}}" class="p-3" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Nature des traveaux</label>
                        <input type="text" name="nature" class="form-control" placeholder="Nature des traveaux">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Quantité Matières Consommables</label>
                        <input type="text" name="quantite" class="form-control" placeholder="Quantité Matières Consommables">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Lieu d'intervention</label>
                        <input type="text" name="lieu" class="form-control" placeholder="Lieu d'intervention">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Observation</label>
                        <input type="text" name="observation" class="form-control" placeholder="Observation">
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