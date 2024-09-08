@extends('layouts.apps')
@section('content')

<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Saisir un Pavillon</h1>
            <a href="{{ url()->previous() }}" class=" float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </a>

        </div>

        @if (session('success'))
        <div class="alert alert-primary text-dark">
            {{ session('success') }}
        </div>
        @endif




        <div class="card-body">
            <form action="{{route('pavillon.add')}}" class="p-3" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Pavillon</label>
                        <input type="text" name="NomPav" class="form-control" placeholder="Pavillon">
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