@extends('layouts.plantilla')

@section('css')
@endsection

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">
            Usuarios
        </h3>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-10">
                            <p class="m-0 font-weight-bold">Usuarios Registrados</p>
                        </div>
                        
                        <div class="col-2 text-right">
                            <a href="{{ url('users/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="miTabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre(s)</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lastName }}</td>
                                <td>{{ $user->motherName }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->birthday }}</td>
                                <td>
                                    <a href="{{ url('users/'. $user->id .'/edit') }}" class="btn btn-primary">Editar</a>
                                    @include('users.delete', ['user'])
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if(Session::get('mensaje'))
                        <div class="alert alert-{{Session::get('color-class')}} mt-3" role="alert">
                            {{ Session::get('mensaje') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
