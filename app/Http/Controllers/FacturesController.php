<?php

namespace App\Http\Controllers;
use App\models\Factures;

use Illuminate\Http\Request;

class FacturesController extends Controller
{
    public function index()
    {
        $facture = Factures::All();
        return view('Factures.index',compact('facture'));
    }

    public function create(){
        return view('Factures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'facture.*' => 'required|mimes:pdf,jpg,png|max:2048', // Chaque fichier doit être PDF, JPG ou PNG
            'nom_facture' => 'required|string|max:255', // Nom de la facture requis
        ]);
        
        // Création d'une nouvelle instance de Factures
        $facture = new Factures();
        
        $chemins = []; // Tableau pour stocker les chemins des fichiers
        
        if ($request->hasFile('facture')) {
            foreach ($request->file('facture') as $file) {
                // Génération du nom de fichier avec un timestamp pour le rendre unique
                $filename = time() . '_' . $file->getClientOriginalName();
                
                // Sauvegarde le fichier dans le dossier 'storage/app/public/factures'
                $path = $file->storeAs('public/factures', $filename);
                
                // Ajoute uniquement le chemin relatif au tableau des chemins
                $chemins[] = 'factures/' . $filename;
            }
        }
        
        // Si des fichiers ont été téléchargés, encodez les chemins en JSON pour les stocker
        if (!empty($chemins)) {
            $facture->chemin_facture = json_encode($chemins);
        }
        
        // Enregistre les autres informations dans la base de données
        $facture->nom_facture = $request->nom_facture;
        $facture->save();
        
        return redirect()->route('Factures.index')->with('success', "Factures ajoutées avec succès");
    }

    public function edit($id)
{
    $facture = Factures::findOrFail($id);
    return view('Factures.edit', compact('facture'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'facture.*' => 'required|mimes:pdf,jpg,png|max:2048', // Chaque fichier doit être PDF, JPG ou PNG
        'nom_facture' => 'required|string|max:255', // Nom de la facture requis
    ]);
    
    // Création d'une nouvelle instance de Factures
    $facture = new Factures();
    
    $chemins = []; // Tableau pour stocker les chemins des fichiers
    
    if ($request->hasFile('facture')) {
        foreach ($request->file('facture') as $file) {
            // Génération du nom de fichier avec un timestamp pour le rendre unique
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Sauvegarde le fichier dans le dossier 'storage/app/public/factures'
            $path = $file->storeAs('public/factures', $filename);
            
            // Ajoute uniquement le chemin relatif au tableau des chemins
            $chemins[] = 'factures/' . $filename;
        }
    }
    
    // Si des fichiers ont été téléchargés, encodez les chemins en JSON pour les stocker
    if (!empty($chemins)) {
        $facture->chemin_facture = json_encode($chemins);
    }
    
    // Enregistre les autres informations dans la base de données
    $facture->nom_facture = $request->nom_facture;
    $facture->save();
    
    return redirect()->route('Factures.index')->with('success', "Factures ajoutées avec succès");
}
public function destroy($id)
    {
        $fiche = Factures::findOrFail($id);
        $fiche->delete();
        return redirect()->route('Factures.index')->with('success', 'Factures supprimée successfully');
    }
}
