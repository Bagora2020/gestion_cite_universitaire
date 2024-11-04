<div>
    <h2>Formulaire de matières et quantités</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <form wire:submit.prevent="save">
        <!-- Afficher chaque groupe de champs dynamiques -->
        @foreach ($inputs as $index)
            <div class="row mb-3" wire:key="input-field-{{ $index }}">
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Matière"
                           wire:model="matieres.{{ $index }}" name="matieres" required>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" placeholder="Quantité"
                           wire:model="quantites.{{ $index }}" name="quantite" required>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-danger" wire:click.prevent="removeInput({{ $index }})">
                        Supprimer
                    </button>
                </div>
            </div>
        @endforeach

        <!-- Bouton pour ajouter un nouveau champ dynamique -->
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary mb-3" wire:click.prevent="addInput">
                Ajouter un champ
            </button>
        </div>

        <!-- Bouton pour soumettre le formulaire -->
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
