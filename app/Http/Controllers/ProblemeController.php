<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Probleme;
use App\models\Pavillon;
use App\Models\Notification;
use App\Models\FicheIntervention;


class ProblemeController extends Controller
{
    public function index(Request $request)
    {
        $probleme = Probleme::All();
        $fiche = FicheIntervention::All();


        \Log::info("Request Data: ", $request->all());

    // Valider les dates
    $request->validate([
        'start_date' => 'nullable|date',
        'end_date' => 'nullable|date|after_or_equal:start_date',
    ]);

    $query = Probleme::query();

    // Vérifier et formater les dates
    if ($request->has('start_date') && $request->has('end_date')) {
        $startDate = \Carbon\Carbon::parse($request->input('start_date'))->startOfDay();
        $endDate = \Carbon\Carbon::parse($request->input('end_date'))->endOfDay();
        
        // Debugging: Log les dates utilisées pour le filtrage
        \Log::info("Start Date: " . $startDate);
        \Log::info("End Date: " . $endDate);

        // Appliquer le filtre de date
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    $probleme = $query->get();

    \Log::info("Filtered Results: ", $probleme->toArray());

    $notifications = Notification::where('read', false)->get();
    
        
        return view('probleme.index',compact('probleme','notifications', 'fiche'));
    }

    public function create(){
        $pavillon= Pavillon::all();

        $notifications = Notification::where('read', false)->get();
        return view('probleme.create',compact('pavillon','notifications'));
    }

    public function show($id){
        $probleme= Probleme::findOrFail($id);
        $notifications = Notification::where('read', false)->get();
        return view('probleme.show',compact('probleme','notifications'));
    }



    public function store(Request $request)
    {
        $probleme = $request->all();

        $probleme = new probleme();

    
        $request->validate([
            'images.*' => 'required|mimes:jpg,png,jpeg|', // Chaque fichier doit être une image
            
            'NumChambre' => 'required',
            'Objet' => 'required',
            'message' => 'required',
            'pavillon_NomPav' => 'required',
        ]);
    
        $imagePaths = [];
        
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/img', $filename);
                $imagePaths[] = str_replace('public/', '', $path); // Conserve le chemin relatif
            }
        }
              $lastProbleme = Probleme::orderBy('id', 'desc')->first();
    
            // Vérifier si un problème existe déjà, sinon démarrer à 1
            $lastNumeroSerie = $lastProbleme ? intval($lastProbleme->numSerie) : 0;
        
            // Générer un nouveau numéro de série avec un padding de 4 chiffres (ex: 0001, 0002, etc.)
            $newNumeroSerie = str_pad($lastNumeroSerie + 1, 4, '0', STR_PAD_LEFT);
        

        // Enregistrement des autres informations, y compris le chemin de l'image
        Probleme::create([

            
            'Appartement' => $request->Appartement,
            'NumChambre' => $request->NumChambre,
            'Objet' => $request->Objet,
            'images' => json_encode($imagePaths), // Encode le tableau en JSON
            'message' => $request->message,
            'pavillon_NomPav' => $request->pavillon_NomPav,
           'numSerie' => $newNumeroSerie,
        ]);

        

        // Créer une notification pour le problème ajouté
        Notification::create([
            'message' => 'Un nouveau problème a été signalé dans le pavillon ' . $request->pavillon_NomPav,
             ]);

             $notifications = Notification::where('read', false)->get();

        return redirect()->route('probleme.index', compact('notifications'))->with('success', "probleme ajouté avec Succés");


            
    }


    public function edit($id)
    {
        $probleme = Probleme::findOrFail($id);
        $pavillon = Pavillon::all(); 
        return view('probleme.edit', compact('probleme', 'pavillon'));
    }

    public function update(Request $request, $id)
    {

       
        $probleme = Probleme::findOrFail($id);
        $probleme->update($request->all());
        

        // Validation des nouvelles images si présentes
       
        $imagePaths = [];
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('public/img', $filename);
                $imagePaths[] = str_replace('public/', '', $path); // Conserve le chemin relatif
            }
        }
    
    
        // Mise à jour du problème avec les nouvelles informations
        $probleme->update([
            'Appartement' => $request->Appartement,
            'NumChambre' => $request->NumChambre,
            'Objet' => $request->Objet,
            'images' => json_encode($imagePaths), // Met à jour les images existantes avec les nouvelles
            'message' => $request->message,
            'pavillon_NomPav' => $request->pavillon_NomPav,
        ]);
    
        
        return redirect()->route('probleme.index')->with('success', "probleme ajouté avec Succés");
    }
    
    public function updateEtat(Request $request)
    {
        $probleme = Probleme::findOrFail($request->id); // Trouver le problème avec l'ID
        $probleme->etat = $request->etat; // Mettre à jour l'état
        $probleme->save(); // Sauvegarder les modifications
    
        return response()->json(['success' => true]); // Répondre à la requête Ajax avec un succès
    }



    public function destroy($id)
    {
        $probleme = Probleme::findOrFail($id);
        $probleme->delete();
        return redirect()->route('probleme.index')->with('success', 'pavillon supprimer successfully');
    }
}
