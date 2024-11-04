<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\models\Notification;

class MatiereController extends Controller
{
    public function index()
    {
        $matiere = User::All();
        
        $notifications = Notification::where('read', false)->get();
        return view('matiere.index',compact('matiere','notifications'));
    }
}
