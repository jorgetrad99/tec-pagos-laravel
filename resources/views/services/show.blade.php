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
                    
                    <form action="{{ route('services.update', $service) }}" onsubmit="return confirmarPago()" name="formulario" method="POST">
                    {{-- <form method="POST"> --}}
                        <div class="form-group">
                            <label>Concepto</label>
                            <input type="text" name="name" id="name" col="2" class="form-control" value="{{ old('name', $service->name) }}" readonly>
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
                                        <input type="text" name="balance" id="balance" value="${{ App\Card::find(Auth::user()->id - 1) -> balance }}" class="form-control" readonly>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col">
                                        <label>Correo</label>
                                        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" readonly>
                                    </div>
                                    <div class="col">
                                        <label>Saldo Posterior</label>
                                        <input type="text" onload="calcularSaldoPosterior();" name="balance_pos" id="balance_pos" value="${{ App\Card::find(Auth::user()->id - 1) -> balance }}" class="form-control" readonly>
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
                                        <input id="cantidad" onchange="changeValues()" type="number" name="saldo" value="0" min="1" max="5" step="1" class="form-control" pattern="[0-5]" required>
                                    </div>
                                    <div class="col">
                                        <label>Total</label>
                                        <input id="total" onload="changeValues()" type="text" name="total" value="$0.00" class="form-control" required readonly>
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
        
        var total = precio_u * cantidad;

        return parseFloat(total);
    }

    function imprimirTotal(){
        const options2 = { style: 'currency', currency: 'USD' };
        const numberFormated = new Intl.NumberFormat('en-US', options2);

        document.getElementById("total").value = numberFormated.format(calcularTotal());
        
    }

    function calcularSaldoPosterior(){
        var balance_pos = document.getElementById("balance_pos").value;
        var balance = document.getElementById("balance").value;

        const options2 = { style: 'currency', currency: 'USD' };
        const numberFormated = new Intl.NumberFormat('en-US', options2);

        var precio_u = document.getElementById("precio-u").value;
        var cantidad = document.getElementById("cantidad").value;
        
        var total = precio_u * cantidad;

        balance = balance.slice(1);     //eliminamos el signo de pesos ($) para poder hacer operaciones

        balance = parseFloat(balance);      //De String a Float  
        
        if(cantidad <= 5 && cantidad >= 0){
            if(balance > calcularTotal()){
                sald_pos = balance - calcularTotal();

                sald_pos = numberFormated.format(sald_pos); //le damos formato monetario
                document.getElementById("balance_pos").value = sald_pos;
            }else{
                alert("El Saldo Disponible no es suficiente")
                document.getElementById("cantidad").value = 1;
                changeValues();
            }       
        } else {
            alert("El campo cantidad debe estar entre 1 y 5.\nEstableciendo 1 como valor predeterminado en la cantidad de los productos")
            document.getElementById("cantidad").value = 1;
            changeValues();
        } 
    }

    function changeValues(){
        //if(document.getElementById("balance_pos").value.slice(1) > document.getElementById("total").value) {
            
            calcularSaldoPosterior();
            imprimirTotal();
    }

    function confirmarPago(){
        changeValues();
        if(document.getElementById("cantidad").value > 0 && document.getElementById("cantidad").value <= 5 ){
            if(!confirm(`¿Desea pagar ${document.getElementById("cantidad").value} servicio(s) de concepto "${document.getElementById("name").value}"?`)){
                return false;
            } else{
                document.formulario.submit(); 
            }
        } 
    }

</script>

@endsection
