@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Afegir un nou vehicle
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST">
            {{ csrf_field() }}

            <div class="form-group">
               <label for="bastidor">Número de bastidor</label>
               <input type="text" name="bastidor" id="bastidor" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa el input per emplenar el any en el que es va matricular el vehicle --}}
               <label for="any_matriculacio">Any de matriculació</label>
               <input type="text" name="any_matriculacio" id="any_matriculacio" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa l'input per dir el tipus de combustible que utilitza el vehicle --}}
               <label for="combustible">Combustible</label>
               <input type="text" name="combustible" id="combustible" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa l'input per dir el numero de portes que te el vehicle --}}
               <label for="portes">Portes</label>
               <input type="text" name="portes" id="portes" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa l'input per dir el numero de places que te el vehicle --}}
               <label for="places">Places</label>
               <input type="text" name="places" id="places" class="form-control">
            </div>

            <div class="form-group" id="actualTipusVehicle">
               <div class="form-group">
                  {{-- TODO: Completa l'input per dir la marca del vehicle --}}
                  <label for="marca2">Marca</label>
                  <select id="marca2" name="marca2" class="form-control" style="height:30px">
                     @foreach ($arrayTipus_vehicles as $tipus_vehicle)
                           <option value="{{ $tipus_vehicle->marca }}">{{ $tipus_vehicle->marca }}</option>
                     @endforeach
                  </select>
               </div>

               <div class="form-group">
                  {{-- TODO: Completa l'input per dir el model del vehicle --}}
                  <label for="model2">Model</label>
                  <select id="model2" name="model2" class="form-control" style="height:30px">
                     @foreach ($arrayTipus_vehicles as $tipus_vehicle)
                           <option value="{{ $tipus_vehicle->model }}">{{ $tipus_vehicle->model }}</option>
                     @endforeach
                  </select>
               </div>

               <div class="form-group">
                  <p><b>Vols afegir una nova marca i model?</b></p>
                  <button class="btn btn-success" type="button" id="nouTVButton">Afegir</button> 
               </div>
            </div>

            <div class="form-group" id="nouTipusVehicle">
               <div class="form-group">
                  {{-- TODO: Completa l'input per dir la marca del vehicle --}}
                  <label for="marca">Marca</label>
                  <input type="text" name="marca" id="marca" class="form-control">
               </div>

               <div class="form-group">
                  {{-- TODO: Completa l'input per dir el model del vehicle --}}
                  <label for="model">Model</label>
                  <input type="text" name="model" id="model" class="form-control">
               </div>

               <div class="form-group">
                  <button class="btn btn-danger" type="button" id="cancelarTVButton">Cancelar</button> 
               </div>
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Afegir vehicle
               </button>
            </div>

            {{-- TODO: Tancar formulari --}}
            </form>
         </div>
      </div>
   </div>
</div>
@stop