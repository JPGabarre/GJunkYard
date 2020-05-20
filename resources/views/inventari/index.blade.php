@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lista de Vehicles (<span class="total_records"></span>)</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/inventari/create')}}"> Nou vehicle</a>
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <input type="text" name="searchVehicles" id="searchVehicles" class="form-control" placeholder="Busca per qualsevol dade dels vehicles" />
    </div>
    <table class="table" style="text-align:center">
        <thead>
            <tr>
                <th style="text-align:center">Marca</th>
                <th style="text-align:center">Model</th>
                <th style="text-align:center">Any Matriculació</th>
                <th style="padding-left:110px; width:280px;">Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <!--
    @foreach($arrayVehicles as $vehicle)
    <tr>
        <td>{{ $vehicle->tipus_vehicle->marca}}</td>
        <td>{{ $vehicle->tipus_vehicle->model}}</td>
        <td>{{ $vehicle->any_matriculacio }}</td>
        <td>
            <a class="btn btn-info" href="{{ url('/inventari/show/'.$vehicle->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ url('/inventari/edit/'.$vehicle->id) }}">Editar</a>
            <form action="{{action('InventariController@deleteVehicle', $vehicle->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
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
-->
    
@stop