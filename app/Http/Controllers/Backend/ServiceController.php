<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Service;
use App\Card;
use App\Http\Requests\ServiceRequest;
use App\Http\Requests\CardRequest;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->paginate(20);

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        //salvar
        Service::create([
            'user_id' => auth()->user()->id
        ] + $request->all());

        //Retornar
        return back()->with('status', 'Creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service, Card $card)  //Confirm Payment
    {
        $card = Card::where('user_id', auth()->user()->id)->first();

        return view('services.show', compact('service', 'card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, Service $service)
    {
        dd($request->total);
        $service->update($request->all());

        return back()->with('status', 'Servicio Actualizado con Éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return back()->with('status', 'Servicio Eliminado con Éxito');
    }
}
