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
                            <p class="m-0 font-weight-bold">Nuevo Usuario</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url('users') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="name">Nombre</label>
                                <input class="form-control" type="text" placeholder="Nombre(s)" name="name" id="name" pattern="[a-zA-Z]{1,70}" oninput="maxlogStr(this);" maxlength="70" required />
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Escriba su nombre(s).</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="lastName">Apellido Paterno</label>
                                <input class="form-control" type="text" placeholder="Apellido paterno" name="lastName" id="lastName" pattern="[a-zA-Z]{1,70}" oninput="maxlogStr(this);" maxlength="70" required />
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Escriba su apellido paterno.</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="motherName">Apellido Materno</label>
                                <input class="form-control" type="text" placeholder="Apellido Materno" name="motherName" id="motherName" pattern="[a-zA-Z]{1,70}" oninput="maxlogStr(this);" maxlength="70" required />
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Escriba su apellido materno.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="email">Correo Electrónico</label>
                                <input class="form-control" type="email" placeholder="a@b.c" name="email" id="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" required />
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Por favor ingrese su correo electrónico.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label for="phone">Teléfono</label>
                                <input class="form-control" type="text" placeholder="1234567890" name="phone" id="phone" pattern="[0-9]{10}" oninput="maxlogStr(this);" maxlength="10" required />
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Por favor ingrese su número telefónico.</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="birthday">Fecha de Nacimiento</label>
                                <input class="form-control" type="date" name="birthday" id="birthday" pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}" min="1970-01-01" max="<?php echo date('Y-m-d'); ?>" required />
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Por favor especifique su fecha de nacimiento.</div>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="gender">Género</label>
                                <select class="form-control" name="gender" id="gender" required />
                                    <option value="" selected disabled hidden>Seleccione su género</option>
                                    <option value="M">Mujer</option>
                                    <option value="H">Hombre</option>
                                </select>
                                <div class="valid-feedback">¡Correcto!</div>
                                <div class="invalid-feedback">Por favor especifique su fecha de nacimiento.</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Crear</button>
                            <a class="btn btn-secondary" href="{{ url('users') }}">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/users/create.js') }}"></script>
@endsection
