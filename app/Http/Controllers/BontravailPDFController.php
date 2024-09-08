<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Probleme;
use Barryvdh\DomPDF\Facade\Pdf;

class BontravailPDFController extends Controller
{
    public function index($id)
    {
    $invoice= Probleme::find($id);
        
    $pdf = Pdf::loadView('pdf.bontravail', compact('invoice'));

    return $pdf->stream();
    }
}
