@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Servicio</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('services.store') }}" method="POST">
                        <div class="form-group">
                            <label>Concepto *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Importe *</label>
                            <input type="number" name="amount" value="0.5" min="0.01" max="5000.00" step="0.5" class="form-control" required>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" name="Enviar" class="btn btn-sm btn-primary float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
