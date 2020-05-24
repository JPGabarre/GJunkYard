<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treball;
use App\Tipus_treball;
use App\Rol;

class TreballsController extends Controller
{
    public function getTreballs(){
        $treball = Treball::all();
        $tipus_treball = Tipus_treball::all();

        return view('treballs.index',array('arrayTreballs'=>$treball),array('arrayTipus_Treballs'=>$tipus_treball));
    }

    //PUT per canviar el estat de un treball(per fer, fent, acabat)
    public function putRealitzarTreball($id,Request $request){

        $treball = Treball::findOrFail($id);
        $id_tipus_treball = $request->input('id_tipus_treball');

        //Aquest if es per evitar de que s'intenti canviar el estat del treball actual per el mateix
        if( $treball->id_tipus_treball!=$id_tipus_treball){
            $p = new Treball;
            $o = $p -> findOrFail($id);
            $o->id_tipus_treball = $id_tipus_treball;
            $o->save();
        }

        $treball = Treball::findOrFail($id);
        
        return redirect('/treballs');
    }

    public function getTreball($id){
        $treball = Treball::findOrFail($id);

        return view('treballs.show', array('treball'=>$treball));
    }

    public function getCreateTreball(){
        $rol = Rol::all();
        $tipus_treball = Tipus_treball::all();

        return view('treballs.create',array('arrayRols'=>$rol),array('arrayTipus_Treballs'=>$tipus_treball));
    }

    public function postCreateTreball(Request $request)
    {
        $resum = $request->input('resum');
        $descripcio = $request->input('descripcio');
        $urgencia = $request->input('urgencia');
        $id_tipus_treball = $request->input('id_tipus_treball');
        $id_rol = $request->input('id_rol');

        $p = new Treball;
        $p->resum = $resum;
        $p->descripcio = $descripcio;
        $p->urgencia = $urgencia;
        $p->id_tipus_treball = $id_tipus_treball;
        $p->id_rol = $id_rol;
        $p->save();

        return redirect('/treballs');
    }

    public function getEditTreball($id){
        $treball = Treball::findOrFail($id);
        $tipus_treball = Tipus_treball::all();
        $rol = Rol::all();

        return view('treballs.edit',array('treball'=>$treball,'arrayTipus_Treballs'=>$tipus_treball,'arrayRols'=>$rol));
    }

    public function putEditTreball(Request $request, $id)
    {
        $p = new Treball;
        $o = $p -> findOrFail($id);
        $o->resum = $request->input('resum');
        $o->descripcio = $request->input('descripcio');
        $o->urgencia = $request->input('urgencia');
        $o->id_tipus_treball = $request->input('id_tipus_treball');
        $o->id_rol = $request->input('id_rol');
        $o->save();

        $treball = Treball::findOrFail($id);
        
        return redirect('/treballs/show/'.$id);
    }

    public function deleteTreball($id){

        $p = new Treball;
        $o = $p -> findOrFail($id);
        $o->delete();

        return redirect('/treballs');
    }
}
