@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/treballs/edit/'.$treball->id) }}" style="margin-right:5px">Editar</a>
                <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
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
        <h4>{{$treball->resum}}</h4>
        <h4>{{$treball->descripcio}}</h4>
        <h4>Treball dirigit al rol de {{$treball->rols->nom}}</h4>
        <h4><b>Estat: </b>{{$treball->tipus_treball->nom}}  <b>Urgencia: </b>{{$treball->urgencia}}</h4>
    </div>
    
@stop