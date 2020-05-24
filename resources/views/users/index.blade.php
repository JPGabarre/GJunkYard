@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{url('/users/create')}}"> Nou Usuari</a>
                @if(Auth::user()->id_rol == 1)
                    <a class="btn btn-primary" href="{{url('/users/xml/export')}}"> Descarregar XML</a>
                @endif
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Llistat d'usuaris (<span class="total_records"></span>)</h2>
            </div>  
        </div>
    </div>
    <br>
    <div class="form-group">
        <input type="text" name="searchUsers" id="searchUsers" class="form-control" placeholder="Busca per qualsevol dade dels usuaris" />
    </div>
    <br>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Cognoms</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th style="width:280px;">Accions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
<script>
    $(document).ready(function(){

        fetch_customer_dataUsers();

    });
</script>
@stop