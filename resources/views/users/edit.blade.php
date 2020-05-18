@extends('layouts.master')

@section('content')

<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Afegir un nou usuari
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST">
            {{ csrf_field() }}
            {{method_field('PUT')}}

            <div class="form-group">
               <label for="DNI">DNI</label>
               <input type="text" name="DNI" id="DNI" class="form-control" value="{{$user->DNI}}">
            </div>

            <div class="form-group">
               {{-- TODO: Completa el input per emplenar el nom del nou usuari --}}
               <label for="nom">Nom</label>
               <input type="text" name="nom" id="nom" class="form-control" value="{{$user->nom}}">
            </div>

            <div class="form-group">
               {{-- TODO: Completa el input per emplenar els cognoms del nou usuari --}}
               <label for="cognoms">Cognoms</label>
               <input type="text" name="cognoms" id="cognoms" class="form-control" value="{{$user->cognoms}}">
            </div>

            <div class="form-group">
                {{-- TODO: Completa el input per emplenar el telefon del nou usuari --}}
               <label for="telefon">Telefon</label>
               <input type="text" name="telefon" id="telefon" class="form-control" value="{{$user->telefon}}">
            </div>

            <div class="form-group">
                {{-- TODO: Completa el input per emplenar el correu electronic del nou usuari --}}
               <label for="email">Correu Electronic</label>
               <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}">
            </div>

            <div class="form-group">
                {{-- TODO: Completa el input per emplenar la contrasenya del nou usuari --}}
               <label for="pass1">Contrasenya Nova</label>
               <input type="text" name="pass1" id="pass1" class="form-control">
            </div>

            <div class="form-group">
                {{-- TODO: Completa el input per emplenar la contrasenya del nou usuari --}}
               <label for="pass2">Confirma la contrasenya nova</label>
               <input type="text" name="pass2" id="pass2" class="form-control">
            </div>

            <div class="form-group">
                {{-- TODO: Completa l'input per dir el rol que tindra el nou usuari --}}
                <label for="id_rol">Selecciona el rol que tindra: </label>
                <select id="id_rol" name="id_rol" class="form-control" style="height:30px">
                    @foreach ($arrayRols as $rol)
                        @if($rol['id']==$user['id_rol'])
                           <option value="{{ $rol->id }}" selected>{{ $rol->nom }}</option>
                        @else
                           <option value="{{ $rol->id }}">{{ $rol->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Editar usuari
               </button>
            </div>

            {{-- TODO: Tancar formulari --}}
            </form>
         </div>
      </div>
   </div>
</div>
    
@stop