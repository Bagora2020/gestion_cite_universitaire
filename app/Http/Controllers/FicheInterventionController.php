<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\FicheIntervention;

class FicheInterventionController extends Controller
{
    public function index()
    {
        $fiche = FicheIntervention::All();
        return view('ficheintervention.index',compact('fiche'));
    }

    public function create(){
        return view('ficheintervention.create');
    }

    public function store(Request $request)
    {
        $fiche = $request->all();

        $fiche = new FicheIntervention();
        $fiche->create([
            
            'nature' => $request->nature,
            'quantite' => $request->quantite,
            'lieu' => $request->lieu,
            'observation' => $request->observation,
            
        ]);

        return redirect()->route('ficheintervention.index')->with('success', "Pavillon ajouté avec Succés");
    }

    public function edit($id)
    {
        $fiche = FicheIntervention::findOrFail($id);
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
