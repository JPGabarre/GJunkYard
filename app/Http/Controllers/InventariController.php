<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;
use App\Tipus_vehicle;
use App\Pece;
use DB;

class InventariController extends Controller
{
    public function getInventari(){
        $vehicle = Vehicle::all();

        return view('inventari.index',array('arrayVehicles'=>$vehicle));
    }

    function action(Request $request)
    {
        if($request->ajax())
        {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
        $data = DB::table('vehicles')
            ->join('tipus_vehicles', function ($join) {
                $join->on('vehicles.id_tipus_vehicle', '=', 'tipus_vehicles.id')
                ->select('vehicles.*', 'tipus_vehicles.marca', 'tipus_vehicles.model');
            })
            ->where('tipus_vehicles.marca', 'like', '%'.$query.'%')
            ->orWhere('tipus_vehicles.model', 'like', '%'.$query.'%')
            ->orWhere('vehicles.any_matriculacio', 'like', '%'.$query.'%')
            ->orderBy('tipus_vehicles.marca', 'asc')
            ->get();
        }
        else
        {
        $data = DB::table('vehicles')
        ->join('tipus_vehicles', function ($join) {
            $join->on('vehicles.id_tipus_vehicle', '=', 'tipus_vehicles.id')
                    ->select('vehicles.*', 'tipus_vehicles.marca', 'tipus_vehicles.model')
                    ->orderBy('tipus_vehicles.marca', 'asc');
        })
        ->get();
        }
        $total_row = $data->count();
        if($total_row > 0)
        {
        foreach($data as $row)
        {
            $output .= '
            <tr>
                <td>'.$row->marca.'</td>
                <td>'.$row->model.'</td>
                <td>'.$row->any_matriculacio.'</td>
                <td>
                    <a class="btn btn-info" href="inventari/show/'.$row->id.'">Mostrar</a>
                    <a class="btn btn-primary" href="inventari/edit/'.$row->id.'">Editar</a>
                    <form action="inventari/delete/'.$row->id.'" method="POST" style="display:inline; margin-right:5px;">
                        <button type="submit" class="btn btn-danger" style="display:inline">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
            ';
        }
        }
        else
        {
        $output = '
        <tr>
            <td align="center" colspan="5">No Data Found</td>
        </tr>
        ';
        }
        $data = array(
        'table_data'  => $output,
        'total_data'  => $total_row
        );

        echo json_encode($data);
        }
    }

    public function getVehicle($id){
        $vehicle = Vehicle::findOrFail($id);
        
        $arrayPeces = Pece::where('id_vehicle',$id)->get();

        return view('inventari.show', array('vehicle'=>$vehicle), array('arrayPeces'=>$arrayPeces));
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
        $marcaSelect = $request->input('marca2');
        $modelSelect = $request->input('model2');


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
            $v->id_tipus_vehicle = $tipus_vehicle[0]->id;
            $v->save();
        }else{
            $tipus_vehicle = Tipus_vehicle::where('model',$modelSelect)->get();
            if($tipus_vehicle[0]->marca==$marcaSelect){
                //Es creara un vehicle i el id del tipus vehicle serà el del select
                $v = new Vehicle;
                $v->bastidor = $bastidor;
                $v->combustible = $combustible;
                $v->portes = $portes;
                $v->places = $places;
                $v->any_matriculacio = $any_matriculacio;
                $v->id_tipus_vehicle = $tipus_vehicle[0]->id;
                $v->save();
            }
        }

        $vehicle = Vehicle::where('bastidor',$bastidor)->get();

        return view('peces.opcions',array('vehicle'=>$vehicle[0]));
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
        $marcaSelect = $request->input('marca2');
        $modelSelect = $request->input('model2');

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
            $tipus_vehicle = Tipus_vehicle::where('model',$modelSelect)->get();
            if($tipus_vehicle[0]->marca==$marcaSelect){
                //Es creara un vehicle i el id del tipus vehicle serà el del select
                $p = new Vehicle;
                $v = $p -> findOrFail($id);
                $v->bastidor = $request->input('bastidor');
                $v->combustible = $request->input('combustible');
                $v->portes = $request->input('portes');
                $v->places = $request->input('places');
                $v->any_matriculacio = $request->input('any_matriculacio');
                $v->id_tipus_vehicle = $tipus_vehicle[0]->id;
                $v->save();
            } 
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

    public function getCreatePece($id){
        return view('peces.create',array('id'=>$id));
    }

    public function CreatePece($arrayInputs,$id){

        //Variable dels inputs dirigits a la taula tipus_vehicle
        $referencia = $arrayInputs['referencia'];
        $nom = $arrayInputs['nom'];
        $quantitat = $arrayInputs['quantitat'];
        $preu = $arrayInputs['preu'];

        //Primer es crearà un nou tipus vehicle
        $t = new Pece;
        $t->referencia = $referencia;
        $t->nom = $nom;
        $t->quantitat = $quantitat;
        $t->preu = $preu;
        $t->id_vehicle = $id;
        $t->save();
    }

    public function CreatePeceSelect(Request $request, $id){
        $arrayInputs = [
            'referencia' => $request->input('referencia'),
            'nom' => $request->input('nom'),
            'quantitat' => $request->input('quantitat'),
            'preu' => $request->input('preu'),
        ];

        switch ($request->input('options')) {
            case 'another':
                    $this->CreatePece($arrayInputs, $id);
                    return view('peces.create',array('id'=>$id));
                break;
    
            case 'finish':
                    $referencia = $request->input('referencia');
                    $nom = $request->input('nom');
                    $quantitat = $request->input('quantitat');
                    $preu = $request->input('preu');
            
                    if(isset($referencia) && isset($nom) && isset($quantitat) && isset($preu)){
                        $this->CreatePece($arrayInputs, $id);
                    }
            
                    $vehicle = Vehicle::findOrFail($id);
            
                    return redirect('/inventari/show/'.$id);
                break;
        }
    }

    public function getEditPece($id){
        $pece = Pece::findOrFail($id);

        return view('peces.edit',array('pece'=>$pece));
    }

    public function putEditPece(Request $request, $id)
    {
        $p = new Pece;
        $v = $p -> findOrFail($id);
        $v->referencia = $request->input('referencia');
        $v->nom = $request->input('nom');
        $v->quantitat = $request->input('quantitat');
        $v->preu = $request->input('preu');
        $v->save();

        $vehicle = Vehicle::findOrFail($id);

        return redirect('/inventari/show/'.$vehicle->id);
    }


    public function deletePece($id)
    {
        $p = new Pece;
        $o = $p -> findOrFail($id);
        $o->delete();

        $vehicle = Vehicle::findOrFail($id);
        
        return redirect('/inventari/show/'.$vehicle->id);
    }
}
