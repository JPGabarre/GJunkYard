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
               <label for="resum">Resum per el treball</label>
               <input type="text" name="resum" id="resum" class="form-control">
            </div>

            <div class="form-group">
               {{-- TODO: Completa el input per emplenar la descripció del treball que crearem --}}
               <label for="descripcio">Descripció</label>
               <input type="text" name="descripcio" id="descripcio" class="form-control">
            </div>

            <div class="form-group">
                {{-- TODO: Selecciona el tipus d'urgencia que tindra aquest treball per realitzar-se (depenguen del numero de urgencia que diguem quan aparegui el treball apareixera d'un color en particular )--}}
                <label for="urgencia">Urgència</label>
                <select id="urgencia" name="urgencia" class="form-control" style="height:30px">
                    <option value="1">No corra presa ...</option>
                    <option value="2">És necessari ...</option>
                    <option value="3">És important tenir-ho fet com més aviat millor ...</option>
                </select>
            </div>

            <div class="form-group">
                {{-- TODO: Selecciona el tipus de treball per saber en quina columna es trobara aquest treball per realitzar-se (per defecte sol ser en la de treballs per fer) --}}
                <label for="id_tipus_treball">Estat actual del treball</label>
                <select id="id_tipus_treball" name="id_tipus_treball" class="form-control" style="height:30px">
                    @foreach ($arrayTipus_Treballs as $tipus_treball)
                        @if($tipus_treball['id']==1)
                            <option value="{{ $tipus_treball->id }}" selected>{{ $tipus_treball->nom }}</option>
                        @else
                            <option value="{{ $tipus_treball->id }}">{{ $tipus_treball->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{-- TODO: Seleccionar el rol el qual podra realitzar aquest tipus de feina (nomes podran ser el rol d'oficina o de treballador, ja que el administrador no te restriccions) --}}
                <label for="id_rol">Rol per al qual està dirigit aquest treball</label>
                <select id="id_rol" name="id_rol" class="form-control" style="height:30px">
                    @foreach ($arrayRols as $rol)
                        @if($rol['id']!=1)
                            <option value="{{ $rol->id }}">{{ $rol->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Afegir treball
               </button>
            </div>

            {{-- TODO: Tancar formulari --}}
            </form>
         </div>
      </div>
   </div>
</div>
    
@stop