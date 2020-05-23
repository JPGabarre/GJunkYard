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
        <div style="margin-left:1%">
            <table class="table" style="text-align:center">
                <tr>
                    <th colspan="4" style="text-align:center">{{$tipus_treball->nom}}</th>
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
                                @if($tipus_treball['id']!=3)
                                    <form method="POST" action="{{action('TreballsController@putRealitzarTreball', $treball->id)}}">
                                        {{ csrf_field() }}
                                        {{method_field('PUT')}}
                                        
                                        <td>
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
                                        <td>
                                            <button type="submit" class="btn btn-success" style="display:inline">
                                                Trametre
                                            </button>
                                        </td>
                                    {{-- TODO: Tancar formulari --}}
                                    </form>
                                @endif
                                <td>
                                @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                    <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" style="display:inline">
                                            X
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
                                @if($tipus_treball['id']!=3)
                                    <form method="POST" action="{{action('TreballsController@putRealitzarTreball', $treball->id)}}">
                                        {{ csrf_field() }}
                                        {{method_field('PUT')}}
                                        
                                        <td>
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
                                        <td>
                                            <button type="submit" class="btn btn-success" style="display:inline">
                                                Trametre
                                            </button>
                                        </td>
                                    {{-- TODO: Tancar formulari --}}
                                    </form>
                                @endif
                                <td>
                                @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                    <form action="{{action('TreballsController@deleteTreball', $treball->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger" style="display:inline">
                                            X
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
    
@stop