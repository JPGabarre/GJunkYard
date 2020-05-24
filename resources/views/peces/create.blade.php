@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Afegir peça al vehicle
         </div>
         <div class="card-body" style="padding:30px">

            <form action="{{action('InventariController@CreatePeceSelect',$id)}}" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
               <label for="referencia">Número de referència</label>
               <input type="text" name="referencia" id="referencia" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa el input per emplenar el nom de la peça --}}
               <label for="nom">Nom de la peça</label>
               <input type="text" name="nom" id="nom" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa l'input per la quantitat que tenim d'aquesta peça --}}
               <label for="quantitat">Quantitat</label>
               <select id="quantitat" name="quantitat" class="form-control" style="height:30px">
                  <option value="0">0</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
               </select>
            </div>

            <div class="form-group">
               {{-- TODO: Completa l'input per dir el preu de referencia de la peça --}}
               <label for="preu">Preu de referència</label>
               <input type="text" name="preu" id="preu" class="form-control">
            </div>

            <div class="form-group text-center">
               <button type="submit" name="options" class="btn btn-primary" style="display:inline" value="another">
                  Afegir un altre peça
               </button>
               <button type="submit" name="options" class="btn btn-info" style="display:inline" value="finish">
                  Finalitzar
               </button>
            </div>

            {{-- TODO: Tancar formulari --}}
            </form>
         </div>
      </div>
   </div>
</div>
    
@stop