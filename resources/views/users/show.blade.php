@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('/users/edit/'.$user->id) }}" style="margin-right:5px">Editar</a>
                <form action="{{action('UsersController@deleteUser', $user->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" style="display:inline">
                            Eliminar
                        </button>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <h2><b>{{$user->nom}}  {{$user->cognoms}}</b></h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h4><b>DNI: </b> {{$user->DNI}} </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h4><b>Telèfon: </b> {{$user->telefon}} </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h4><b>E-mail: </b> {{$user->email}} </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h4><b>Rol: </b> {{$user->rols->nom}} </h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <h4><b>Permisos</b></h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <p>{{$user->rols->permisos}}</p>
            </div>
        </div>
    </div>
</div>
    
@stop