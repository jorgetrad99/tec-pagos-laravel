<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
/* use Illuminate\Http\Request; */
use App\Http\Requests\UserRequest;
use App\User;
use App\Card;

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


        if ($request->user_type == 2) {

            factory(Card::class)->create([
                'balance' => 500.00,
                'user_id' => User::create([
                    'id' => auth()->user()->id
                ] + $request->all())
            ]);
        } else {
            User::create([] + $request->all());
        }


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

        //dd($user);

        if ($user->user_type <= 2 && $user->control_number != null) {
            Card::where('control_number', $user->control_number)->delete();
        }
        $user->delete();

        return back()->with('status', 'Usuario Eliminado con Éxito');
    }
}
