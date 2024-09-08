@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Ajouter une facture</h1>
            <a href="{{ url()->previous() }}" class=" float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>

        </div>

        <div class="col-md-8 m-auto text-center mt-3">
            <img class="img-fluid" src="" alt=""
            srcset="/img/facturee.jpg" width="250px" height="180px">
        </div>

        @if (session('success'))
        <div class="alert alert-primary text-dark">
            {{ session('success') }}
        </div>
        @endif




        <div class="card-body">
            <form action="{{ route('Factures.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">lébellé</label>
                        <input type="text" name="nom_facture" class="form-control" placeholder="nom_facture">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="facture">Joindre une facture</label>
                        <input type="file" name="facture[]" class="form-control" accept="application/pdf, image/*" multiple required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Enregistrer</button>
            </form>

        </div>


    </div>
</div>

@endsection