@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/inventari/edit/'.$vehicle->id) }}" style="margin-right:5px">Editar</a>
                <form action="{{action('InventariController@deleteVehicle', $vehicle->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" style="display:inline">
                            Eliminar
                        </button>
                </form>
            </div>
        </div>
    </div>

    <div>
        <h4><b>Marca: </b> {{$vehicle->tipus_vehicle->marca}} <b>Model: </b> {{$vehicle->tipus_vehicle->model}} </h4>
        <h4><b>Numero Bastidor: </b> {{$vehicle->bastidor}}</h4>
        <h4><b>Combustible: </b> {{$vehicle->combustible}} <b>Portes: </b> {{$vehicle->portes}} <b>Places: </b> {{$vehicle->places}} </h4>
        <h4> Peces del vehicle </h4>
        <p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. 
        Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
        cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y 
        los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, 
        sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. 
        Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, 
        y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</p>
    </div>
    
    
@stop