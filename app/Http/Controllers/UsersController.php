<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
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
       
        
        $users = User::All();
        return view('admin.users.index',compact('users'))->with('user', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    }
}
