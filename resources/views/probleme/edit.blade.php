<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.2/dist/cerulean/bootstrap.min.css">
  
<div class="mx-auto container p-3">
    <div class="card">
        <div class="card-header d-flex align-content-center justify-content-between">
            <h1 class="h2">Nouvelle recette</h1>
            <button class="float-end btn btn-danger">
                <i class="bi bi-arrow-90deg-left"></i>
                Retour
            </button>
        </div>
        <div class="card-body">
        <form action="{{route('probleme.update', $probleme->id)}}" class="p-3" method="post">
                 @csrf
                 @method('PUT')
                 <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="pavillon_NomPav">Pavillon</label>
                        <select name="pavillon_NomPav" class="form-control" id="pavillon_NomPav" value="{{$probleme->pavillon_NomPav}}">
                            <option value="">Sélectionnez un pavillon</option>
                            @foreach($pavillon as $pavillons)
                            <option value="{{$pavillons->id}}">{{$pavillons->NomPav}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Appartement</label>
                        <input type="number" name="Appartement" class="form-control" placeholder="Appartement" value="{{$probleme->Appartement}}">
                    </div>
                   

                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">N° Chambre</label>
                        <input type="number" name="NumChambre" class="form-control" placeholder="N° Chambre" value="{{$probleme->NumChambre}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="">Objet</label>
                        <input type="text" name="Objet" class="form-control" placeholder="Objet" value="{{$probleme->Objet}}">
                    </div>
                </div>
                <div class="row mb-3">
    <div class="col-12 col-md-6">
        <!-- Upload de nouvelles images -->
        <label for="images">Ajouter des images</label>
        <input type="file" name="images[]" id="images" class="form-control-file" multiple>
        <small>Formats acceptés : JPG, PNG. Taille max : 2MB.</small>

        <!-- Affichage des images existantes -->
        <h5 class="mt-4">Images existantes :</h5>
        @if($probleme->images)
            <div class="d-flex flex-wrap">
                @foreach(json_decode($probleme->images) as $image)
                    <div class="m-2">
                        <img src="{{ asset('storage/' . $image) }}" alt="Image" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                        <div>
                            <a href="{{ asset('storage/' . $image) }}" target="_blank">Télécharger {{ basename($image) }}</a>
                        </div>
                        <!-- Option pour supprimer l'image -->
                        
                @endforeach
            </div>
        @else
            <p><strong>Aucune image disponible</strong></p>
        @endif
    </div>
</div>


                    <div class="col-12 col-md-6">
                        <label for="">message</label>
                        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Entrez votre message ici...">{{ old('message', $probleme->message) }}</textarea>

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




