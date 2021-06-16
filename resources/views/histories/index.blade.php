@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Historial
                    {{-- <a href="{{ route('services.create') }}" class="btn btn-success btn-sm float-right">Crear</a> --}}
                    
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
                                <th>Numero de Control</th>
                                <th>Concepto</th>
                                <th>Cantidad</th>
                                <th>Total Pagado</th>
                                <th>Fecha y Hora</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($histories as $history)
                                <tr>
                                    <td>{{ $history->id }}</td>
                                    <td>{{ $history->control_number }}</td>
                                    <td>{{ $history->name }}</td>
                                    <td>{{ $history->amount }}</td>
                                    <td>{{ $history->total }}</td>
                                    <td>{{ $history->created_at }}</td>
                                    
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
            <div class="pagination float-right">
                @if (Auth::user()->user_type <=1)
                    {{  $histories->links() }}
                @endif    
            </div>
        </div>
    </div>
</div>
@endsection
