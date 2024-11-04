@extends('layouts.apps')
@section('content')
    <div class="mx-auto container p-3">
    <div class="card">
    <div class="card-header d-flex align-content-center justify-content-between">
<div style = "margin: 15px;">
<div class="modal-body">
                        <p><strong>Pavillon :</strong> {{$probleme->pavillon->NomPav}}</p>
                        <p><strong>Appartement :</strong> {{$probleme->Appartement}}</p>
                        <p><strong>Objet :</strong> {{$probleme->Objet}}</p>
                        <p><strong>Message :</strong> {{$probleme->message}}</p>
                        <p><strong>Date :</strong>{{ $probleme->created_at->format('Y-m-d') }}</p>

                        @if($probleme->images)
                            @foreach(json_decode($probleme->images) as $image)
                                <img src="{{ asset('storage/' . $image) }}" alt="Image du problème" class="img-fluid" style="max-width: 100px; max-height: 100px; margin: 5px;">
                            @endforeach
                        @else
                            <p>Aucune image disponible</p>
                        @endif
                    </div>

                    <div class="form-check form-switch">
        <input type="checkbox" 
               class="form-check-input etat-switch" 
               data-id="{{ $probleme->id }}" 
               {{ $probleme->etat ? 'checked' : '' }}
               id="etat{{ $probleme->id }}"
               data-objet="{{ $probleme->Objet }}" 
               data-numserie="{{ $probleme->numSerie }}
               style="width: 30px; height: 19px; cursor: pointer;"
               data-bs-toggle="modal" 
               data-bs-target="#interventionModal{{ $probleme->id }}">
        <label class="form-check-label" for="etat{{ $probleme->id }}">
            {{ $probleme->etat ? 'Résolu' : 'Non Résolu' }}
        </label>
    </div>

    <div class="modal fade" id="interventionModal{{ $probleme->id }}" tabindex="-1" aria-labelledby="interventionModalLabel{{ $probleme->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="interventionModalLabel{{ $probleme->id }}">Remplir la fiche d'intervention</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ficheintervention.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="probleme_id" value="{{ $probleme->id }}">
                        
                        
                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                                <label for="objetField" class="form-label">Objet</label>
                                <input type="text" class="form-control" id="objetField" name="objet" value="{{$probleme->Objet}}" readonly>
                            </div>
                            <div class="col-12 col-md-6">
                                <label for="numSerieField" class="form-label">Numéro de Série</label>
                                <input type="text" class="form-control" id="numSerieField" name="numSerie" value="{{$probleme->numSerie}}" readonly>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col-12 col-md-6">
                            <label for="lieuField" class="form-label">Lieu</label>
                            <input type="text" class="form-control" id="lieuField" name="lieu" value="{{$probleme->pavillon->NomPav}}" readonly >
                            </div>

                            <div class="col-12 col-md-6">
                            <label for="nom" class="form-label">Nom de l'ouvrier</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                            </div> 
                        </div>

                        <div class="mb-3">
                            <label for="Secteur" class="form-label">Secteur de l'ouvrier</label>
                            <input type="text" class="form-control" id="Secteur" name="Secteur" required>
                        </div>


                        <div id ="formfield">
                            <div class="row mb-3">
                        
                                <div class="col-12 col-md-5">
                                    <label for="matieres" class="form-label">Matières</label>
                                    <input type="text" class="form-control" id="add" name="matieres" placeholder="Matières" required>
                                </div>

                                <div class="col-12 col-md-5">
                                    <label for="quantite" class="form-label">Quantité</label>
                                    <input type="text" class="form-control" id="add" name="quantite" placeholder="Qantité" required>
                                </div>

                                <div class="col-12 col-md-2 d-flex align-items-end">
                                    <button  class="add" onclick="add()">
                                        <i class="fa fa-plus-circle"></i>
                                    </button>
                                </div>
                        
                            </div>
                        </div>
                    </form>
                </div>

            </div> 
        </div> 
    </div> 
    

    <div style = "margin: 15px;">
     <h1>Forulaire de saisie     </h1>
     <div class="row mb-3">
        <form action="">
            <div class="col-12 col-md-5">
                <label for="matieres" class="form-label">Matières</label>
                <input type="text" class="form-control" id="add" name="matieres" placeholder="Matières" required>
            </div>

            <div class="col-12 col-md-5">
                <label for="quantite" class="form-label">Quantité</label>
                <input type="text" class="form-control" id="add" name="quantite" placeholder="Qantité" required>
            </div>

            <div class="col-12 col-md-5">
            <button type="submit" class="btn btn-success">Enregistrer</button>
            </div>

        </form>
        </div>
        <div class="row mb-3">
            <table>
              <thead>
                <tr>  
                    <th scope="col"># id</th> 
                    <th scope="col">Matière</th>
    
                    <th scope="col">Quantité</th>
           
                </tr>
              </thead>
            
            <tbody>
             @foreach($probleme as $index => $problemes)
                 <tr>
            
                    <td class="text-center">{{$fiches->id}}</td>

                    <td class="text text-center">{{$fiches->matieres}}</td>
                   <td class="text text-center">{{$fiches->quantite}}</td>
                 <tr>
                @endforeach
                </table>
        </div>

    </div>
    </div>
@endsection