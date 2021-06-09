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
                    <form action="{{ route('services.update'), $service }}" method="POST">
                    <div class="form-group">
                            <label>Concepto</label>
                            <input type="text" name="name" col="2" class="form-control" value="{{ old('name', $service->name) }}" readonly>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Número de Control</label>
                                        <input type="text" name="control_number" value="{{ Auth::user()->control_number }}" class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label>Saldo Disponible</label>
                                        <input type="number" name="balance" value="{{ App\Card::find(Auth::user()->id - 1) -> balance }}" min="0.01" max="5000" step="0.01" class="form-control" readonly>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Correo</label>
                                        <input type="text" name="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label>Saldo Posterior</label>
                                        <input type="number" name="balance" value="{{ App\Card::find(Auth::user()->id - 1) -> balance }}" min="0.01" max="5000" step="0.01" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>P. Unitario</label>
                                        <input id="precio-u" type="number" name="amount" value="{{ old('amount', $service->amount) }}" min="0.01" max="5000" step="0.01" class="form-control" required readonly>
                                    </div>
                                    <div class="col">
                                        <label>Cantidad</label>
                                        <input id="cantidad" onchange=" calcularTotal();" type="number" name="saldo" value="1" min="1" max="5" step="1" class="form-control" required>
                                    </div>
                                    <div class="col">
                                        <label>Total</label>
                                        <input id="total" onload="clacularTotal()" type="text" name="total" value="${{ old('amount', $service->amount) }}" class="form-control" required readonly>
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
<script>

    function calcularTotal(){
        var precio_u = document.getElementById("precio-u").value;
        var cantidad = document.getElementById("cantidad").value;
        
        const options2 = { style: 'currency', currency: 'USD' };
        const numberFormated = new Intl.NumberFormat('en-US', options2);

        var total = precio_u * cantidad;

        document.getElementById("total").value = numberFormated.format(total);
    }
</script>

@endsection
