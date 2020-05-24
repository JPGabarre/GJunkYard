<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use App\Vehicle;
use App\Tipus_vehicle;
use App\Pece;
use App\Tipus_treball;
use App\Treball;

class APIController extends Controller
{
    //Les seguents funcions que trobarem son per retornar una API les dades, en llista o individualment, de les entitats de la BD
    
    //USERS
    public function indexUsers() {
        return response()->json( User::all() );
    }

    public function showUser($id){
        return response()->json( User::findOrFail($id) );
    }

    //ROLS
    public function indexRols() {
        return response()->json( Rol::all() );
    }

    public function showRols($id){
        return response()->json( Rol::findOrFail($id) );
    }

    //TIPUS VEHICLES
    public function indexTipusVehicles() {
        return response()->json( Tipus_vehicle::all() );
    }

    public function showTipusVehicle($id){
        return response()->json( Tipus_vehicle::findOrFail($id) );
    }

    //VEHICLES
    public function indexVehicles() {
        return response()->json( Vehicle::all() );
    }

    public function showVehicle($id){
        return response()->json( Vehicle::findOrFail($id) );
    }

    //PECES
    public function indexPeces() {
        return response()->json( Pece::all() );
    }

    public function showPece($id){
        return response()->json( Pece::findOrFail($id) );
    }

    //TIPUS TREBALLS
    public function indexTipusTreballs() {
        return response()->json( Tipus_treball::all() );
    }

    public function showTipusTreball($id){
        return response()->json( Tipus_treball::findOrFail($id) );
    }

    //TREBALLS
    public function indexTreballs() {
        return response()->json( Treball::all() );
    }

    public function showTreball($id){
        return response()->json( Treball::findOrFail($id) );
    }
}
