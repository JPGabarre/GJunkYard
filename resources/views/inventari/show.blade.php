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
        <br>
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3> Peces del vehicle </h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/inventari/create/'.$vehicle->id.'/peces') }}">Afegir Peces</a>
            </div>
        </div>
        </div>
        <table class="table" style="text-align:center">
            <tr>
                <th style="text-align:center">Nom</th>
                <th style="text-align:center">Numero de Referencia</th> 
                <th style="text-align:center">Stock</th>
                <th style="text-align:center">Preu</th>
                <th style="padding-left:110px; width:280px;">Accions</th>
            </tr>
            @foreach($arrayPeces as $pece)
            <tr>
                <td>{{ $pece->nom}}</td>
                <td>{{ $pece->referencia}}</td>
                <td>{{ $pece->quantitat}}</td>
                <td>{{ $pece->preu}}</td>
                <td>
                    <a class="btn btn-primary" href="{{ url('/peces/edit/'.$pece->id) }}" style="margin-right:5px">Editar</a>
                    <form action="{{action('InventariController@deletePece', $pece->id)}}" method="POST" style="display:inline; margin-right:5px;">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" style="display:inline">
                                Eliminar
                            </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    
    
@stop