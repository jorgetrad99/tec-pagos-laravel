@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Tarjetas
                    <a href="{{ route('services.create') }}" class="btn btn-success btn-sm float-right">Crear</a>
                    
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
                                <th>Número de Control</th>
                                <th>Saldo Disponible</th>
                                <th>Fecha de Creación</th>
                                {{-- <th>&nbsp;</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cards as $card)
                                <tr>
                                    <td>{{ $card->id }}</td>
                                    <td>{{ $card->control_number }}</td>
                                    <td>${{ $card->balance }}</td>
                                    <td>${{ $card->created_at }}</td>

                                    {{-- <td class="column">
                                        <div class="btn-group row justify-content-around">
                                            <a href="{{ route('cards.edit', $card) }}" class="btn btn-sm btn-primary">
                                                Editar
                                            </a>    
                                            <form action="{{ route('cards.destroy', $card) }}" method="POST"> 
                                                @csrf
                                                @method('DELETE')
                                                <input 
                                                    type="submit" 
                                                    value="Eliminar" 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Desea Eliminar?')"    
                                                >
                                            </form>
                                        </div>
                                    </td> --}}
                                    
                                </tr>
                            @endforeach
                            {{-- <style>
                                .card-body{
                                    padding-bottom: 0; 
                                }
                                .column{
                                    padding-left: 5px; 
                                }
                                
                                .bt-group > a, input {
                                    margin: 5px;
                                    border-radius: 0.2rem;
                                }s
                                .pagination{
                                    padding: 5px;
                                    margin: 0;
                                }
                            </style> --}}
                        </tbody>
                        
                    </table>
                </div>
                
            </div>
            <div class="pagination float-right">
                {{  $cards->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
