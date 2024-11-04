<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\FicheIntervention;
use App\models\Notification;
use App\models\Probleme;

class FicheInterventionController extends Controller
{
    public function index()
    {
        $fiche = FicheIntervention::with('probleme.pavillon')->get();
        
        $notifications = Notification::where('read', false)->get();
        return view('ficheintervention.index',compact('fiche','notifications'));
    }

    public function create(){
        $notifications = Notification::where('read', false)->get();
        return view('ficheintervention.create', compact('notifications'));
    }

    public function store(Request $request)
    {
        $fiche = $request->all();

        $fiche = new FicheIntervention();
        $fiche->create([
            'objet' => $request->Objet,
            'numSerie' => $request->numSerie,
            'probleme_id' => $request->probleme_id,
            
            'objet' => $request->objet,
            'numSerie' => $request->numSerie,
            
            'quantite' => $request->quantite,
            'nom' => $request->nom,
            'Secteur' => $request->Secteur,
            'matieres' => $request->matieres,
            'lieu' => $request->lieu,
            'observation' => $request->observation,
            
        ]);

        
        Probleme::where('id', $request->probleme_id)->update(['etat' => 1]);
        return redirect()->route('probleme.index')->with('success', "Pavillon ajouté avec Succés");
    }

    
    public function showFichesByProbleme($id)
{
    $notifications = Notification::where('read', false)->get();
    $fiches = FicheIntervention::where('id', $id) 
                                ->with('probleme')
                                ->get();
    return view('ficheintervention.index', compact('fiches','notifications'));
}


    
    public function edit($id)
    {
        $fiche = FicheIntervention::with('probleme')->findOrFail($id);
        return view('ficheintervention.edit', compact('fiche'));
    }

    public function update(Request $request, $id)
    {
        $fiche = FicheIntervention::findOrFail($id);
        $fiche->update($request->all());
        return redirect()->route('ficheintervention.index')->with('success', 'fiche updated successfully');
    }

    public function destroy($id)
    {
        $fiche = FicheIntervention::findOrFail($id);
        $fiche->delete();
        return redirect()->route('ficheintervention.index')->with('success', 'fiche supprimée successfully');
    }

}
