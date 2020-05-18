<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Tipus_vehicle;

class InventariController extends Controller
{
    public function getInventari(){
        $vehicle = Vehicle::all();

        return view('inventari.index',array('arrayVehicles'=>$vehicle));
    }

    public function getVehicle($id){
        return view('inventari.show', array('id'=>$id));
    }

    public function getCreateVehicle(){
        $tipus_vehicle = Tipus_vehicle::all();

        return view('inventari.create',array('arrayTipus_vehicles'=>$tipus_vehicle));
    }

    public function getEditVehicle($id){
        return view('inventari.edit', array('id'=>$id));
    }
}
