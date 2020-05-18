@extends('layouts.master')

@section('content')

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Llistat de tasques</h2>
            </div>
            @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                <div class="pull-right">
                    <a class="btn btn-success" href="{{url('/treballs/create')}}"> Nou Treball</a>
                </div>
            @endif
        </div>
    </div>
<br>
<div class="row">
    @foreach($arrayTipus_Treballs as $tipus_treball)
        <div style="margin:auto">
            <table class="table" style="text-align:center">
                <tr>
                    <th colspan="2" style="text-align:center">{{$tipus_treball->nom}}</th>
                </tr>
                @foreach($arrayTreballs as $treball)
                    @if($treball['id_tipus_treball']== $tipus_treball['id'])
                        @if($treball['id_rol'] <= 2 && Auth::user()->id_rol <= 2)
                            @if($treball['urgencia']== 3)
                                <tr style="background-color:#fba550">
                            @elseif($treball['urgencia']== 2)
                                <tr style="background-color:#ffec75">
                            @else
                                <tr>
                            @endif
                                <td><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                <td>
                                @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                    <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" style="display:inline">
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                                </td>
                            </tr>
                        @elseif($treball['id_rol'] == 3)
                            @if($treball['urgencia']== 3)
                                <tr style="background-color:#fba550">
                            @elseif($treball['urgencia']== 2)
                                <tr style="background-color:#ffec75">
                            @else
                                <tr>
                            @endif
                                <td><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                <td>
                                @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                    <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" style="display:inline">
                                            Eliminar
                                        </button>
                                    </form>
                                @endif
                                </td>
                            </tr>
                        @endif
                    @endif
                @endforeach
            </table>
        </div>
    @endforeach
</div>
<br>
    <table class="table" style="text-align:center">
        <tr>
            <th style="text-align:center">Resum</th>
            <th style="text-align:center">Descripcio</th>
            <th style="text-align:center">Urgencia</th>
            <th style="text-align:center">Estat</th>
            <th style="padding-left:110px; width:280px;">Acciones</th>
        </tr>
    @foreach($arrayTreballs as $treball)
    <tr>
        <td>{{ $treball->resum}}</td>
        <td>{{ $treball->descripcio}}</td>
        <td>{{ $treball->urgencia}}</td>
        <td>{{ $treball->tipus_treball->nom}}</td>
        <td>
            <a class="btn btn-info" href="{{ url('/treballs/show/'.$treball->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ url('/treballs/edit/'.$treball->id) }}">Editar</a>
            <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
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
    
@stop