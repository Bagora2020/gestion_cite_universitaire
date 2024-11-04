<?php

namespace App\Http\Controllers;
use App\models\FicheIntervention;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class FicheInterventionPDFController extends Controller
{
    public function index($id)
    {
    $fiche= FicheIntervention::find($id);
        
    $pdf = Pdf::loadView('pdf.FicheInterventionPDF', compact('fiche'));

    return $pdf->stream();

    
}
}