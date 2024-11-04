<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\support\facades\Gate;

class UsersController extends Controller
{
    public function __contruct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('read', false)->get();
        
        $users = User::All();
        return view('admin.users.index',compact('users','notifications'))->with('user', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notifications = Notification::where('read', false)->get();
        $roles = Role::all();  // Si vous avez des rôles à assigner aux utilisateurs
        return view('admin.users.create', compact('roles','notifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Créer un nouvel utilisateur
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Assigner des rôles si applicable
    if ($request->roles) {
        $user->roles()->attach($request->roles);
    }

    return redirect()->route('users.index')->with('success', 'Utilisateur ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        if(Gate::denies('edit-users')){
            return redirect()->route('users.index');
        }
        $roles = Role::All();
        return view('admin.users.edit', [

            'user'=>$user,
             'roles'=> $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Gate::denies('delete-users')){
            return redirect()->route('users.index');
        }
        

        $user->roles()->detach();
       
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }


    public function toggleStatus($id)
{
    $user = User::findOrFail($id);
    $user->status = !$user->status; // Bascule entre actif et inactif
    $user->save();

    return redirect()->route('users.index')->with('success', 'Statut de l\'utilisateur mis à jour avec succès.');
}

}
