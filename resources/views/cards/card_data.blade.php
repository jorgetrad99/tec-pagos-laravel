@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Información de la Tarjeta</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    {{-- <form action="{{ route('cards.update', $service, $card) }}" onsubmit="return confirmarPago()" name="formulario" method="POST">
                    {{-- <form method="POST"> --}}
                       {{-- @dd($card); --}}
                        <div class="form-group">
                            <label>Nombre del titular</label>
                            <input type="text" name="name" id="name" col="2" class="form-control" value="{{ auth()->user()->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Número de Control</label>
                                        <input type="text" name="control_number" value="{{ $card->control_number }}" class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label>Saldo Disponible</label>
                                        <input type="text" name="balance" id="balance" value="${{ $card -> balance }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Correo vinculado</label>
                            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Fecha de Creación de la Tarjeta</label>
                                        <input type="text" name="updated_at" id="updated_at" value="{{ $card -> created_at }}" class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label>Fecha en que la Tarjeta fue actualizada</label>
                                        <input type="text" name="updated_at" id="updated_at" value="{{ $card -> updated_at }}" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
