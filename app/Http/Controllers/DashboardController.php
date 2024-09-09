<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Probleme;
use App\models\Factures;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer le nombre total de problèmes
        $totalProblemes = Probleme::count();
        $totalfactures = Factures::count();

        

         // Récupérer le nombre de problèmes résolus
         $problemesResolus = Probleme::where('etat', 1)->count();
        // Récupérer le nombre de problèmes non-résolus
         $problemesNonResolus = $totalProblemes - $problemesResolus;



         // Récupérer le nombre total de problèmes par pavillon
        $problemesParPavillon = Probleme::selectRaw('pavillon_NomPav, COUNT(*) as total')
        ->groupBy('pavillon_NomPav')
        ->get();

        // Passer les pavillons et les totaux à la vue
        $pavillons = $problemesParPavillon->pluck('pavillon_NomPav'); // Noms des pavillons
        $totaux = $problemesParPavillon->pluck('total'); // Nombre de problèmes par pavillon



        // Passer la variable à la vue
        return view('dashboard.index', compact('totalProblemes', 'problemesResolus', 'problemesNonResolus', 'totalfactures', 'pavillons','totaux'));
    }
}
