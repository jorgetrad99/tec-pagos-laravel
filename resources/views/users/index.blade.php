@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Usuarios
                    {{-- <a href="{{ route('users.create') }}" class="btn btn-success btn-sm float-right">Crear</a> --}}
                    <a class="btn btn-success btn-sm float-right">Crear</a>
                    
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
                                <th>Email</th>
                                <th>Num. Control</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->control_number }}</td>
                                    <td class="column">
                                        <div class="btn-group row justify-content-around">
                                            <a class="btn btn-sm btn-primary">
                                                Editar
                                            </a>    
                                            {{-- <a href="{{ route('services.edit', $service) }}" class="btn btn-sm btn-primary">
                                                Editar
                                            </a>    --}} 
                                            {{-- <form action="{{ route('services.destroy', $service) }}" method="POST"> 
                                                @csrf
                                                @method('DELETE')
                                                <input 
                                                    type="submit" 
                                                    value="Eliminar" 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('¿Desea Eliminar?')"    
                                                >
                                            </form> --}}
                                            <input 
                                                type="submit" 
                                                value="Eliminar" 
                                                class="btn btn-sm btn-danger"
                                                onclick="return confirm('¿Desea Eliminar?')"    
                                            >

                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
                            <style>
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
                            </style>
                        </tbody>
                        
                    </table>
                </div>
                
            </div>
            {{-- <div class="pagination float-right">
                {{  $users->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection
