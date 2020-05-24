@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right">
                    <a class="btn btn-success" href="{{url('/inventari/create')}}"> Nou vehicle</a>
                    <a class="btn btn-primary" href="{{url('/inventari/xml/export')}}"> Descarregar XML</a>
                </div>
            </div>
            </div>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Llista de Vehicles (<span class="total_records"></span>)</h2>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <input type="text" name="searchVehicles" id="searchVehicles" class="form-control" placeholder="Busca per qualsevol dada dels vehicles" />
                </div>
            </div>
        </div>
    </div>
    <div class="container table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table">
            <thead>
                <tr>
                    <th>Marca</th>
                    <th>Model</th>
                    <th>Any Matriculació</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    
    
    <script>
        $(document).ready(function(){
        
        fetch_customer_dataVehicles();

        });
    </script>
@stop