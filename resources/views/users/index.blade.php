@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Llistat d'usuaris</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/users/create')}}"> Nou Usuari</a>
            </div>
        </div>
    </div>

    <table class="table" style="text-align:center">
        <tr>
            <th style="text-align:center">Nom</th>
            <th style="text-align:center">Cognoms</th>
            <th style="text-align:center">E-mail</th>
            <th style="text-align:center">Rol</th>
            <th style="padding-left:110px; width:280px;">Acciones</th>
        </tr>
    @foreach($arrayUsers as $user)
    <tr>
        <td>{{ $user->nom}}</td>
        <td>{{ $user->cognoms}}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->rols->nom}}</td>
        <td>
            <a class="btn btn-info" href="{{ url('/users/show/'.$user->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ url('/users/edit/'.$user->id) }}">Editar</a>
            <form action="{{action('UsersController@deleteUser', $user->id)}}" method="POST" style="display:inline; float:right; margin-right:5px;">
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