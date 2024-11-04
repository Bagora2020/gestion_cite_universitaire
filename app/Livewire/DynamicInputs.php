<?php

namespace App\Livewire;

use Livewire\Component;

class DynamicInputs extends Component
{
    public $inputs = [];
    public $matieres = [];
    public $quantites = [];

    // Ajoute un champ de saisie
    public function addInput()
    {
        $this->inputs[] = count($this->inputs); // Ajoute un nouvel index pour un nouvel ensemble de champs
    }

    // Supprime un champ de saisie
    public function removeInput($index)
    {
        unset($this->inputs[$index], $this->matieres[$index], $this->quantites[$index]);
    }

    // Méthode pour enregistrer les données
    public function save()
    {
        // Logique de sauvegarde, par exemple, enregistrer chaque matière et quantité
        foreach ($this->inputs as $index) {
            // Utilisez $this->matieres[$index] et $this->quantites[$index] pour accéder aux valeurs
            // Sauvegardez selon votre logique de base de données
        }

        // Réinitialisation après sauvegarde
        $this->reset(['inputs', 'matieres', 'quantites']);
        session()->flash('message', 'Données enregistrées avec succès.');
    }

    public function render()
    {
        return view('livewire.dynamic-inputs');
    }
}
