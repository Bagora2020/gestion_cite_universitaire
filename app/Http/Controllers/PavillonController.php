<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Pavillon;
use App\models\Notification;

class PavillonController extends Controller
{
    public function index()
    {
        $pavillon = Pavillon::All();
        $notifications = Notification::where('read', false)->get();
        return view('pavillon.index',compact('pavillon','notifications'));
    }

    public function create(){
        $notifications = Notification::where('read', false)->get();
        return view('pavillon.create', compact('notifications'));
    }

    public function store(Request $request)
    {
        $pavillon = $request->all();

        $pavillon = new Pavillon();
        $pavillon->create([
            
            'NomPav' => $request->NomPav,
            
        ]);

        return redirect()->route('pavillon.index')->with('success', "Pavillon ajouté avec Succés");
    }

    public function edit($id)
    {
        $pavillon = Pavillon::findOrFail($id);
        return view('pavillon.edit', compact('pavillon'));
    }

    public function update(Request $request, $id)
    {
        $pavillon = Pavillon::findOrFail($id);
        $pavillon->update($request->all());
        return redirect()->route('pavillon.index')->with('success', 'pavillon updated successfully');
    }

    public function destroy($id)
    {
        $pavillon = Pavillon::findOrFail($id);
        $pavillon->delete();
        return redirect()->route('pavillon.index')->with('success', 'pavillon supprimer successfully');
    }
    
    public function __construct()
    {
        $this->middleware('auth');
    }
}
