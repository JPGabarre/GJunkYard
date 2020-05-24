@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                <div class="pull-right">
                    <a class="btn btn-success" href="{{url('/treballs/create')}}"> Nou Treball</a>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Llistat de tasques</h2>
            </div>
        </div>
    </div>
    <br>
    <div class="row" id="dades">
        @foreach($arrayTipus_Treballs as $tipus_treball)
            <div class="col" style="margin-right:1%; min-width:353px">
                <table class="table" id="taulatreballs">
                    <thead>
                        <tr class="row">
                            <th class="col-md-12">{{$tipus_treball->nom}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($arrayTreballs as $treball)
                            @if($treball['id_tipus_treball']== $tipus_treball['id'])
                                @if($treball['id_rol'] <= 2 && Auth::user()->id_rol <= 2)
                                @if($treball['urgencia']== 3)
                                        <tr style="background-color:#fba550" class="row">
                                    @elseif($treball['urgencia']== 2)
                                        <tr style="background-color:#ffec75" class="row">
                                    @else
                                        <tr class="row">
                                    @endif
                                        @if($tipus_treball['id']!=3)
                                            <td class="col-md-5"><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                            <form method="POST" action="{{action('TreballsController@putRealitzarTreball', $treball->id)}}">
                                                {{ csrf_field() }}
                                                {{method_field('PUT')}}

                                                <td class="col-md-4 col-xs-8">
                                                    <select id="id_tipus_treball" name="id_tipus_treball" class="form-control" style="height:30px">
                                                    @foreach ($arrayTipus_Treballs as $tipus_treball2)
                                                        @if($tipus_treball2['id']==$treball->tipus_treball->id)
                                                            <option value="{{ $tipus_treball2->id }}" selected>{{ $tipus_treball2->nom }}</option>
                                                        @else
                                                            <option value="{{ $tipus_treball2->id }}">{{ $tipus_treball2->nom }}</option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                </td>
                                                <td class="col-md-3 col-xs-4">
                                                    <button type="submit" class="btn btn-success" style=" margin-left: -13px;">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                    </button>
                                                    @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                                        <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger" style="display:inline">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            {{-- TODO: Tancar formulari --}}
                                            </form>
                                        @else
                                            <td class="col-md-7 col-xs-8"><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                            <td class="col-md-5 col-xs-4">
                                                @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                                    <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                                        {{ method_field('PUT') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger" style="display:inline">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @elseif($treball['id_rol'] == 3)
                                    @if($treball['urgencia']== 3)
                                        <tr style="background-color:#fba550" class="row">
                                    @elseif($treball['urgencia']== 2)
                                        <tr style="background-color:#ffec75" class="row">
                                    @else
                                        <tr class="row">
                                    @endif
                                        @if($tipus_treball['id']!=3)
                                            <td class="col-md-5"><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                            <form method="POST" action="{{action('TreballsController@putRealitzarTreball', $treball->id)}}">
                                                {{ csrf_field() }}
                                                {{method_field('PUT')}}

                                                <td class="col-md-4 col-xs-8">
                                                    <select id="id_tipus_treball" name="id_tipus_treball" class="form-control" style="height:30px">
                                                    @foreach ($arrayTipus_Treballs as $tipus_treball2)
                                                        @if($tipus_treball2['id']==$treball->tipus_treball->id)
                                                            <option value="{{ $tipus_treball2->id }}" selected>{{ $tipus_treball2->nom }}</option>
                                                        @else
                                                            <option value="{{ $tipus_treball2->id }}">{{ $tipus_treball2->nom }}</option>
                                                        @endif
                                                    @endforeach
                                                    </select>
                                                </td>
                                                <td class="col-md-3 col-xs-4">
                                                    <button type="submit" class="btn btn-success" style=" margin-left: -13px;">
                                                        <span class="glyphicon glyphicon-ok"></span>
                                                    </button>
                                                    @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                                        <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                                            {{ method_field('PUT') }}
                                                            {{ csrf_field() }}
                                                            <button type="submit" class="btn btn-danger" style="display:inline">
                                                                <span class="glyphicon glyphicon-trash"></span>
                                                            </button>
                                                        </form>
                                                    @endif
                                                </td>
                                            {{-- TODO: Tancar formulari --}}
                                            </form>
                                        @elseif(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                            <td class="col-md-7 col-xs-8"><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                            <td class="col-md-5 col-xs-4">
                                                <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                                    {{ method_field('PUT') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger" style="display:inline">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </button>
                                                </form>
                                            </td>
                                        @else
                                            <td class="col-md-12"><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                                        @endif
                                    </tr>
                                @endif
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
</div>
    
@stop