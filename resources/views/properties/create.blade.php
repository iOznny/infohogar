@extends('layouts.plantilla')

@section('css')
<link rel="stylesheet" href="{{ asset('css/properties/create.css') }}">
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
                            <p class="m-0 font-weight-bold">Publicar Propiedad</p>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ url('properties') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="title">Título del inmueble </label>
                                        <input class="form-control" type="text" placeholder="Inmueble" name="title" id="title" pattern="[a-zA-Z]{3-20}" oninput="maxlogStr(this);" maxlength="20" required />
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Escriba el título del inmueble.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="address">Dirección</label>
                                        <input class="form-control" type="text" placeholder="Dirección del inmueble" name="address" id="address" oninput="maxlogStr(this);" maxlength="70" required />
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor escriba la direeción completa del inmueble.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="state">Estado</label>
                                        <select  class="form-control" name="state" id="state" required>
                                            <option value="" selected disabled hidden>Seleccionar un Estado</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione un estado.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="municipality">Municipio</label>
                                        <select class="form-control" name="municipality" id="municipality" required>
                                            <option value="" selected disabled hidden>Seleecionar un Municipio</option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Asientos">Asientos</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione un municipio.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="typepost">Tipo Publicación</label>
                                        <select  class="form-control" name="typepost" id="typepost" required>
                                            <option value="" selected disabled hidden>Estado del Inmueble</option>
                                            <option value="Rentar">Rentar</option>
                                            <option value="Vender">Vender</option>
                                            <option value="Ambas">Ambas</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione un estado.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="price">Precio</label>
                                        <input class="form-control" type="number" placeholder="Precio sin decimales, puntos o otro caracter." min="1" max="9999999" name="price" id="price" pattern="[0-9]{10}" oninput="maxlogStr(this);" maxlength="10" required />
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor escriba el precio del inmueble.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="price">Tipo de Moneda</label>
                                        <select class="form-control" name="currency" id="currency" required>
                                            <option value="" selected disabled hidden>Tipo de Moneda</option>
                                            <option value="Peso Mexicano">Peso Mexicano</option>
                                            <option value="Peso Uruguayo">Peso Uruguayo</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione el tipo de moneda.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="description">Descripción del Inmueble</label>
                                        <textarea class="form-control" style="resize: none;" name="description" id="description" rows="5" cols="10" oninput="maxlogStr(this);" maxlength="300" required></textarea>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor escriba una descrición del inmueble.</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58626.348895015915!2d-98.22680727227242!3d19.041108098258494!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfc0bd5ebc7a3b%3A0x48a6461de494ad95!2sPuebla%2C%20Pue.!5e0!3m2!1ses-419!2smx!4v1600740701846!5m2!1ses-419!2smx" width="100%" height="97%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3><p class="font-weight-bold">Características</p></h3>

                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="typeproperty">Tipo de Propiedad</label>
                                        <select class="form-control" type="text" name="typeproperty" id="typeproperty" required>
                                            <option value="" selected disabled hidden>Seleccione el Tipo de Propiedad</option>    
                                            <option value="Casa">Casa</option>
                                            <option value="Departamento">Departamento</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione el tipo de propiedad.</div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="bedrooms">Recámaras</label>
                                        <select class="form-control" type="text" name="bedrooms" id="bedrooms" required>
                                            <option value="" selected disabled hidden>Seleccione el número de recamaras</option>    
                                            <option value="1">1</option>
                                            <option value="0">Ninguna</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione el tipo de propiedad.</div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label for="bathrooms">Baño</label>
                                        <select class="form-control" type="text" name="bathrooms" id="bathrooms" required>
                                            <option value="" selected disabled hidden>Seleccione el número de baños</option>    
                                            <option value="1">1</option>
                                            <option value="0">Ninguno</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione el tipo de propiedad.</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="halfbath">Medio Baño</label>
                                        <select class="form-control" type="text" name="halfbath" id="halfbath" required>
                                            <option value="" selected disabled hidden>Seleccione el número de medios baños</option>    
                                            <option value="1">1</option>
                                            <option value="0">Ninguno</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione el número de medios baños.</div>
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="parking">Estacionamiento</label>
                                        <select class="form-control" type="text" name="parking" id="parking" required>
                                            <option value="" selected disabled hidden>Seleccione el número de lugares</option>    
                                            <option value="1">1</option>
                                            <option value="0">Ninguno</option>
                                        </select>
                                        <div class="valid-feedback">¡Correcto!</div>
                                        <div class="invalid-feedback">Por favor seleccione el número de lugares de estacionamiento.</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <h3><p class="font-weight-bold">Fotos</p></h3>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="pictures">Agregar fotos del inmueble</label>
                                        <div class="row">
                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input class="form-control" type="file" name="picture1" id="picture1" required />
                                                    <div class="valid-feedback">¡Correcto!</div>
                                                    <div class="invalid-feedback">Por favor agregue una foto.</div>
                                                </label>
                                            </div>

                                                                <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input class="form-control" type="file" name="picture2" id="picture2" required />
                                                    <div class="valid-feedback">¡Correcto!</div>
                                                    <div class="invalid-feedback">Por favor agregue una foto.</div>
                                                </label>
                                            </div>

                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input class="form-control" type="file" name="picture3" id="picture3" required />
                                                    <div class="valid-feedback">¡Correcto!</div>
                                                    <div class="invalid-feedback">Por favor agregue una foto.</div>
                                                </label>
                                            </div>

                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input class="form-control" type="file" name="picture4" id="picture4" required />
                                                    <div class="valid-feedback">¡Correcto!</div>
                                                    <div class="invalid-feedback">Por favor agregue una foto.</div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input type="file" name="" id="" />
                                                </label>
                                            </div>

                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input type="file" name="" id="" />
                                                </label>
                                            </div>

                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input type="file" name="" id="" />
                                                </label>
                                            </div>

                                            <div class="col-xs-12 col-md-4 col-lg-3">
                                                <label class="label">
                                                    <i class="far fa-file mt-3"></i><br>
                                                    <span>Agregar foto</span>
                                                    <input type="file" name="" id="" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Crear</button>
                                    <a class="btn btn-secondary" href="{{ url('properties') }}">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" src="{{ asset('js/properties/create.js') }}"></script>
@endsection
