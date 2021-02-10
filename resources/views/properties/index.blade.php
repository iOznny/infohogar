@extends('layouts.plantilla')

@section('css')
@endsection

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">
            Bienes Raices
        </h3>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-10">
                            <p class="m-0 font-weight-bold">Bienes Raices Registradas</p>
                        </div>
                        
                        <div class="col-2 text-right">
                            <a href="{{ url('properties/create') }}" class="btn btn-primary"><i class="fas fa-plus-circle"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table id="miTabla" class="display responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Dirección</th>
                                <th>Estado</th>
                                <th>Municipio</th>
                                <th>Tipo Publicación</th>
                                <th>Precio</th>
                                <th>Acciones</th>
                                <th>Asignar User</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($properties as $property)
                            <tr>
                                <td>{{ $property->title }}</td>
                                <td>{{ $property->address }}</td>
                                <td>{{ $property->state }}</td>
                                <td>{{ $property->municipality }}</td>
                                <td>{{ $property->typepost }}</td>
                                <td>{{ number_format($property->price) }}</td>
                                <td>
                                    <a href="{{ url('properties/'. $property->id .'/edit') }}" class="btn btn-primary">Editar</a>
                                    @include('properties.delete', ['property'])
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" data-idproperty="{{ $property->id }}" onclick="getIdProperty(this)" data-toggle="modal" data-target="#exampleModal">Agregar</button>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('addproperty') }}" method="POST" class="needs-validation" novalidate>
            @csrf
                <div class="modal-body">
                    Por favor seleccione un usuario para poder añadirlo como propietario del inmueble.
                    <select class="form-control mt-3" name="user_id" id="user_id" required>
                        <option value="" selected disabled hidden>Seleccione a un usuario</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }} {{ $user->lastName }} {{ $user->motherName }}</option>
                        @endforeach
                    </select>
                    <input class="form-control" type="hidden" name="property_id" id="property_id" />
                    <div class="valid-feedback">¡Correcto!</div>
                    <div class="invalid-feedback">Por favor seleccione un usuario.</div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" type="submit">Añadir</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/properties/create.js') }}"></script>
@endsection
