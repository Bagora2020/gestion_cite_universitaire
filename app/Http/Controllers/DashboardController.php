<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Probleme;
use App\models\Factures;
use App\models\Notification;

class DashboardController extends Controller
{
    public function index()
    {
        //les cinq derniers soummissions
        $derniersProblemes = Probleme::orderBy('created_at', 'desc')->take(5)->get();

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

     

     // Récupérer les notifications non lues
     $notifications = Notification::where('read', false)->get();



     
     // Passer les variables à la vue
     return view('dashboard.index', compact('totalProblemes', 'problemesResolus', 'problemesNonResolus', 'totalfactures', 'pavillons', 'totaux', 'notifications','derniersProblemes'));
}

public function markAsRead()
{
    Notification::where('read', false)->update(['read' => true]);

    // Vérifier le nombre de notifications non lues après l'update
    $nonLues = Notification::where('read', false)->count();
    return response()->json(['status' => 'success', 'non_lues' => $nonLues]);
}

}
