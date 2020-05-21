@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Llistat d'usuaris (<span class="total_records"></span>)</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/users/create')}}"> Nou Usuari</a>
                @if(Auth::user()->id_rol == 1)
                    <a class="btn btn-primary" href="{{url('/users/xml/export')}}"> Descarregar XML</a>
                @endif
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <input type="text" name="searchUsers" id="searchUsers" class="form-control" placeholder="Busca per qualsevol dade dels usuaris" />
    </div>
    <br>
    <table class="table" style="text-align:center">
        <thead>
            <tr>
                <th style="text-align:center">Nom</th>
                <th style="text-align:center">Cognoms</th>
                <th style="text-align:center">E-mail</th>
                <th style="text-align:center">Rol</th>
                <th style="padding-left:110px; width:280px;">Acciones</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

@stop