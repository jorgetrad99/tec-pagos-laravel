@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Usuario</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('users.store') }}" method="POST">
                        <div class="form-group">
                            <label>Nombre Completo *</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Usuario *</label>
                            <select class="form-select" name="user_type">
                                <option value="2">Alumno</option>
                                <option value="1">Administrativo</option>
                              </select>
                        </div>
                        <div class="form-group">
                            <label>Numero de Control</label>
                            <input type="text" name="control_number" pattern="[0-9]{8,8}" placeholder="18800272" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Correo Institucional</label>
                            <input type="email" name="email" placeholder="Ej. iti.18800272@itconkal.edu.mx" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control" required>
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
