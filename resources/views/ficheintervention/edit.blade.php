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
        <form action="{{route('ficheintervention.update', $fiche->id)}}" class="p-3" method="post" value="{{$fiche->id}}">
                 @csrf
                 @method('PUT')
                 <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Nature des traveaux</label>
                        <input type="text" name="nature" class="form-control" placeholder="Nature des traveaux" value="{{$fiche->nature}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Quantité Matières Consommables</label>
                        <input type="text" name="quantite" class="form-control" placeholder="Quantité Matières Consommables" value="{{$fiche->quantite}}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="">Lieu d'intervention</label>
                        <input type="text" name="lieu" class="form-control" placeholder="Lieu d'intervention" value="{{$fiche->lieu}}">
                    </div>

                    <div class="col-12 col-md-6">
                        <label for="">Observation</label>
                        <input type="text" name="observation" class="form-control" placeholder="Observation" value="{{$fiche->observation}}">
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




