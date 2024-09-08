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

    <form action="{{ route('Factures.update', $facture->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nom_facture">Nom de la Facture</label>
            <input type="text" name="nom_facture" id="nom_facture" class="form-control" value="{{ $facture->nom_facture }}" required>
        </div>

        <div class="form-group">
            <label for="facture">Changer la Facture (optionnel)</label>
            <input type="file" name="facture[]" id="facture" class="form-control-file" multiple>
            <small>Formats acceptés : PDF, JPG, PNG. Taille max : 2MB.</small>

            <h5>Fichiers existants :</h5>
                 @if($facture->chemin_facture)
               @foreach(json_decode($facture->chemin_facture) as $file)
            <div>
                <a href="{{ asset('storage/' . $file) }}" target="_blank">Télécharger {{ basename($file) }}</a>
            </div>
               @endforeach
                @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Enregistrer les modifications</button>
    </form>
    </div>
    </div>
</div>


