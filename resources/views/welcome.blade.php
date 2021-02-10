@extends('layouts.plantilla')

@section('css')
@endsection

@section('container')
<div class="container-fluid">
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">
            Dashboard
        </h3>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-3">
                <div class="card-header py-3">
                    <p class="font-weight-bold">Bienes Raices Adquiridas</p>
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($users_properties as $usersproperty)
                        <div class="col-md-3 mt-3">
                            <div class="card">
                                @if(App\Models\Property::find($usersproperty->property_id)->path)
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{ asset('img/properties/' . App\Models\Property::find($usersproperty->property_id)->id .'.png') }}" class="d-block w-100" alt="{{ App\Models\Property::find($usersproperty->property_id)->title }}">
                                                <!-- <div class="carousel-caption d-none d-md-block">
                                                    <h5>First slide label</h5>
                                                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                                                </div> -->
                                            </div>

                                            <div class="carousel-item">
                                                <img src="{{ asset('img/properties/' . App\Models\Property::find($usersproperty->property_id)->id .'.png') }}" class="d-block w-100" alt="{{ App\Models\Property::find($usersproperty->property_id)->title }}">
                                            </div>

                                            <div class="carousel-item">
                                                <img src="{{ asset('img/properties/' . App\Models\Property::find($usersproperty->property_id)->id .'.png') }}" class="d-block w-100" alt="{{ App\Models\Property::find($usersproperty->property_id)->title }}">
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <img src="{{ asset('img/properties/notfound.jpg') }}" class="" width="100%" alt="{{ App\Models\Property::find($usersproperty->property_id)->title }}">
                                @endif
                                <div class="card-body">
                                    <p class="card-text"><span class="badge badge-success">{{ App\Models\Property::find($usersproperty->property_id)->typepost }}</span> - {{ App\Models\Property::find($usersproperty->property_id)->typeproperty }}</p>
                                    <h5 class="card-title font-weight-bold">{{ App\Models\Property::find($usersproperty->property_id)->title }} </h5>
                                    <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ App\Models\Property::find($usersproperty->property_id)->state }}, {{ App\Models\Property::find($usersproperty->property_id)->municipality }} - ${{ number_format(App\Models\Property::find($usersproperty->property_id)->price) }}</p>
                                    <a href="#" class="btn btn-outline-success">Ver más</a>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Propiedad de {{ App\Models\User::find($usersproperty->user_id)->name }} {{ App\Models\User::find($usersproperty->user_id)->lastName }} {{ App\Models\User::find($usersproperty->user_id)->motherName }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection
