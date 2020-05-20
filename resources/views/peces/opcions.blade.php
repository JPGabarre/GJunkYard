@extends('layouts.master')

@section('content')
    <div>
        <h4>Vols afegir alguna peça?</h4>
        <br>
        <a class="btn btn-info" href="{{ url('/inventari/create/'.$vehicle->id.'/peces') }}">Afegir Peces</a>
        <a class="btn btn-primary" href="{{ url('/inventari') }}">Finalitzar</a>
    </div>
@stop