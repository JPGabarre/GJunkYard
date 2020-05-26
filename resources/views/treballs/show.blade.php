@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ url('/treballs/edit/'.$treball->id) }}" style="margin-right:5px">Editar</a>
                    @if( Auth::user()->id_rol != 3)
                        <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger" style="display:inline">
                                Eliminar
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2><b>{{$treball->resum}}</b></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h4>{{$treball->descripcio}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <h4>Treball dirigit al rol de {{$treball->rols->nom}}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 margin-tb">
                    <h4><b>Estat: </b>{{$treball->tipus_treball->nom}}</h4>
                </div>
                <div class="col-lg-6 margin-tb">
                    <h4><b>Urgència: </b>{{$treball->urgencia}}</h4>
                </div>
            </div>
        </div>
    </div>
    
@stop