<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
/* use Illuminate\Http\Request; */
use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);

        /* return view('users.index', [
            'users' => $users
        ]); */
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        //salvar
        /* User::create([
            'id' => auth()->user()->id
        ] + $request->all()); */

        User::create([
            'email_verified_at' => now(),/* 
            'remember_token' => Str::random(10), */
        ] + $request->all());

        //Retornar
        return back()->with('status', 'Creado con éxito');

        /* User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'control_number' => $request->control_number
        ]); 
        return back();*/
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('status', 'Usuario Eliminado con Éxito');
    }
}
