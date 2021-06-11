<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function update(Request $request, Card $card)
    {
        /* dd($request->all()); */
        /* dd((float) (number_format((substr($request->balance, 1) - substr($request->total, 1)), 2))); */
        /* dd((float) (substr($request->balance, 1) - substr($request->total, 1))); */
        /* $discount = (float) (substr($request->balance, 1) - substr($request->total, 1)); */
        /* dd($discount); */

        $balance_pos = (float) (substr($request->balance_pos, 1));
        /* dd($balance_pos); */

        /* $balance_pos = floatval(substr($request->balance_pos, 1)); */
        /* dd($balance_pos); */
        /* $card->update([
            'balance' => $balance_pos
        ] /* + $request->all() ); */

        Card::where('control_number', $request->control_number)
            ->update(['balance' => $balance_pos]);

        /* return back()->with('status', 'El pago se ha efectuado con Éxito'); */
        return redirect('/lista-servicios')->with('status', 'El pago se ha efectuado con Éxito');
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
