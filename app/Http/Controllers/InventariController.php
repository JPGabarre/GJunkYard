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
        $vehicle = Vehicle::findOrFail($id);

        return view('inventari.show', array('vehicle'=>$vehicle));
    }

    public function getCreateVehicle(){
        $tipus_vehicle = Tipus_vehicle::all();

        return view('inventari.create',array('arrayTipus_vehicles'=>$tipus_vehicle));
    }

    public function postCreateTVehicle(Request $request)
    {
        //Variable dels inputs dirigits a la taula tipus_vehicle
        $marca = $request->input('marca');
        $model = $request->input('model');

        //Variables dels inputs dirigits a la taula vehicle
        $bastidor = $request->input('bastidor');
        $combustible = $request->input('combustible');
        $portes = $request->input('portes');
        $places = $request->input('places');
        $any_matriculacio = $request->input('any_matriculacio');
        $id_tipus_vehicle = $request->input('id_tipus_vehicle');


        if(isset($marca) && isset($model)){
            //Primer es crearà un nou tipus vehicle
            $t = new Tipus_vehicle;
            $t->marca = $marca;
            $t->model = $model;
            $t->save();

            //Com extreure la id del tipus vehicle que acabem de crear
            $tipus_vehicle = Tipus_vehicle::where('model',$model)->get();

            //Despres un nou vehicle
            $v = new Vehicle;
            $v->bastidor = $bastidor;
            $v->combustible = $combustible;
            $v->portes = $portes;
            $v->places = $places;
            $v->any_matriculacio = $any_matriculacio;
            $v->id_tipus_vehicle = $tipus_vehicle->id;
            $v->save();
        }else{
            //Es creara un vehicle i el id del tipus vehicle serà el del select
            $v = new Vehicle;
            $v->bastidor = $bastidor;
            $v->combustible = $combustible;
            $v->portes = $portes;
            $v->places = $places;
            $v->any_matriculacio = $any_matriculacio;
            $v->id_tipus_vehicle = $id_tipus_vehicle;
            $v->save();
        }

        return redirect('/inventari');
    }

    public function getEditVehicle($id){
        $vehicle = Vehicle::findOrFail($id);
        $tipus_vehicles = Tipus_vehicle::all();

        return view('inventari.edit',array('vehicle'=>$vehicle),array('arrayTipus_vehicles'=>$tipus_vehicles));
    }

    public function putEditTVehicle(Request $request, $id)
    {
        //Variable dels inputs dirigits a la taula tipus_vehicle
        $marca = $request->input('marca');
        $model = $request->input('model');

        if(isset($marca) && isset($model)){
            //Primer es crearà un nou tipus vehicle
            $t = new Tipus_vehicle;
            $t->marca = $marca;
            $t->model = $model;
            $t->save();

            //Com extreure la id del tipus vehicle que acabem de crear
            $tipus_vehicle = Tipus_vehicle::where('model',$model)->get();

            //Despres un nou vehicle
            $p = new Vehicle;
            $v = $p -> findOrFail($id);
            $v->bastidor = $request->input('bastidor');
            $v->combustible = $request->input('combustible');
            $v->portes = $request->input('portes');
            $v->places = $request->input('places');
            $v->any_matriculacio = $request->input('any_matriculacio');
            $v->id_tipus_vehicle = $tipus_vehicle->id;
            $v->save();
        }else{
            //Es creara un vehicle i el id del tipus vehicle serà el del select
            $p = new Vehicle;
            $v = $p -> findOrFail($id);
            $v->bastidor = $request->input('bastidor');
            $v->combustible = $request->input('combustible');
            $v->portes = $request->input('portes');
            $v->places = $request->input('places');
            $v->any_matriculacio = $request->input('any_matriculacio');
            $v->id_tipus_vehicle = $request->input('id_tipus_vehicle');
            $v->save();
        }

        $vehicle = Vehicle::findOrFail($id);

        return redirect('/inventari/show/'.$id);
    }

    public function deleteVehicle($id)
    {
        $p = new Vehicle;
        $o = $p -> findOrFail($id);
        $o->delete();

        return redirect('/inventari');
    }
}
