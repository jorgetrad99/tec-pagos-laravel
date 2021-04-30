@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Servicios
                    <a href="{{ route('services.create') }}" class="btn btn-primary btn-sm float-right">Crear</a>
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Importe</th>
                                <th colspan="2">&nbsp;</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->id }}</td>
                                    <td>{{ $service->name }}</td>
                                    <td>{{ $service->amount }}</td>
                                    <td>
                                        <a href="{{ route('services.edit', $service) }}" class="btn btn-primary btn-sm ">
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('services.destroy', $service) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                                type="submit" 
                                                value="Eliminar" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Desea Eliminar?')"    
                                            >
                                        </form>
                                    </td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
