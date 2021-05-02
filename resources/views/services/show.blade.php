@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Confirma tu Pago</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- <form action="{{ route('services.update', $service) }}" method="POST"> --}}
                    <form method="POST">
                        <div class="form-group">
                            <label>Concepto</label>
                            <input type="text" name="name" col="2" class="form-control" value="{{ old('name', $service->name) }}" required disabled>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Número de Control</label>
                                        <input type="text" name="control_number" value="{{ Auth::user()->control_number }}" class="form-control" required disabled>
                                    </div>
                                    <div class="col">
                                        <label>Saldo Disponible</label>
                                        <input type="number" name="amount" min="0.01" max="5000" step="0.01" class="form-control" required disabled>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" required disabled>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Precio Unitario</label>
                                        <input type="number" name="amount" value="{{ old('amount', $service->amount) }}" min="0.01" max="5000" step="0.01" class="form-control" required disabled>
                                    </div>
                                    <div class="col">
                                        <label>Cantidad</label>
                                        <input type="number" name="saldo" value="1" min="1" max="50" step="1" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label>Total</label>
                                        <input type="number" name="saldo" min="1" max="50" step="1" class="form-control" required disabled>
                                    </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input href="#" type="submit" value="Confirmar" class="btn btn-sm btn-success float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
