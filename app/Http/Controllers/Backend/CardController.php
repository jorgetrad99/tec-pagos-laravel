<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
/* use Illuminate\Http\Request; */
use App\Http\Requests\CardRequest;
use App\Card;
use App\Service;

class CardController extends Controller
{
    public function index()
    {
        $cards = Card::latest()->paginate(20);

        /* return view('users.index', [
            'users' => $users
        ]); */
        return view('cards.index', compact('cards'));
    }

    /* public function create()
    {
        return view('users.create');
    } */

    /* public function store(UserRequest $request)
    {
        //salvar
         User::create([
            'id' => auth()->user()->id
        ] + $request->all()); 

        User::create([
            'email_verified_at' => now(),/* 
            'remember_token' => Str::random(10), 
        ] + $request->all());

        //Retornar
        return back()->with('status', 'Creado con éxito');

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'control_number' => $request->control_number
        ]); 
        return back();
    } */

    /**
     * Display the specified resource.
     *
     * @param  \App\card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {

        return view('cards.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Card $card)
    {
        $card->update($request->all());

        return back()->with('status', 'Servicio Actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        return back()->with('status', 'Servicio Eliminado con Éxito');
    }
}
