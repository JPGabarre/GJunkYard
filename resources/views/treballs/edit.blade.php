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
            {{method_field('PUT')}}

            <div class="form-group">
               <label for="resum">Resum per el treball</label>
               <input type="text" name="resum" id="resum" class="form-control" value="{{$treball->resum}}">
            </div>

            <div class="form-group">
               {{-- TODO: Completa el input per emplenar la descripció del treball que crearem --}}
               <label for="descripcio">Descripció</label>
               <input type="text" name="descripcio" id="descripcio" class="form-control" value="{{$treball->descripcio}}">
            </div>

            <div class="form-group">
                {{-- TODO: Selecciona el tipus d'urgencia que tindra aquest treball per realitzar-se (depenguen del numero de urgencia que diguem quan aparegui el treball apareixera d'un color en particular )--}}
                <label for="urgencia">Urgencia</label>
                <select id="urgencia" name="urgencia" class="form-control" style="height:30px">
                    @if($treball['urgencia']== 1)
                        <option value="1" selected>No corra presa ...</option>
                        <option value="2">Es necesari ...</option>
                        <option value="3">Es important tenir-ho fet quan abans millor ...</option>
                    @elseif($treball['urgencia']== 2)
                        <option value="1">No corra presa ...</option>
                        <option value="2" selected>Es necesari ...</option>
                        <option value="3">Es important tenir-ho fet quan abans millor ...</option>
                    @elseif($treball['urgencia']== 3)
                        <option value="1">No corra presa ...</option>
                        <option value="2">Es necesari ...</option>
                        <option value="3" selected>Es important tenir-ho fet quan abans millor ...</option>
                    @else
                        <option value="1">No corra presa ...</option>
                        <option value="2">Es necesari ...</option>
                        <option value="3">Es important tenir-ho fet quan abans millor ...</option>
                    @endif
                </select>
            </div>

            <div class="form-group">
                {{-- TODO: Selecciona el tipus de treball per saber en quina columna es trobara aquest treball per realitzar-se (per defecte sol ser en la de treballs per fer) --}}
                <label for="id_tipus_treball">Estat actual del treball</label>
                <select id="id_tipus_treball" name="id_tipus_treball" class="form-control" style="height:30px">
                    @foreach ($arrayTipus_Treballs as $tipus_treball)
                        @if($tipus_treball['id']==$treball->tipus_treball->id)
                            <option value="{{ $tipus_treball->id }}" selected>{{ $tipus_treball->nom }}</option>
                        @else
                            <option value="{{ $tipus_treball->id }}">{{ $tipus_treball->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{-- TODO: Completa l'input per dir quins usuaris depenguen del seu rol podran realitzar aquesta tasca (com a maxim nomes es pot posar el 2, ja que el administrador podra fer qualsevol al no tindre restriccions) --}}
                <label for="id_rol">Rol per el que esta dirigit el seguent treball: </label>
                <select id="id_rol" name="id_rol" class="form-control" style="height:30px">
                    @foreach ($arrayRols as $rol)
                        @if($rol['id']!=1)
                            @if($rol['id']==$treball['id_rol'])
                            <option value="{{ $rol->id }}" selected>{{ $rol->nom }}</option>
                            @else
                            <option value="{{ $rol->id }}">{{ $rol->nom }}</option>
                            @endif
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Editar treball
               </button>
            </div>

            {{-- TODO: Tancar formulari --}}
            </form>
         </div>
      </div>
   </div>
</div>
    
@stop