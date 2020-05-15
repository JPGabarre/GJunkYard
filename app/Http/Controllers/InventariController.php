<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

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
        return view('inventari.create');
    }

    public function getEditVehicle($id){
        return view('inventari.edit', array('id'=>$id));
    }
}
