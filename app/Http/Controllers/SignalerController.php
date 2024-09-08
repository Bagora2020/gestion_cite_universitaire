<?php

namespace App\Http\Controllers;
use App\models\Signaler;

use Illuminate\Http\Request;

class SignalerController extends Controller
{
    public function index()
    {
        $signaler = Signaler::All();
        return view('Signaler.index',compact('signaler'));
    }



    public function edit()
    {
        $signaler = Signaler::All();
        return view('Signaler.edit', compact('signaler'));
    }
}
