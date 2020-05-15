<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treball;
use App\Tipus_treball;

class TreballsController extends Controller
{
    public function getTreballs(){
        $treball = Treball::all();
        $tipus_treball = Tipus_treball::all();

        return view('treballs.index',array('arrayTreballs'=>$treball),array('arrayTipus_Treballs'=>$tipus_treball));
    }

    public function getTreball($id){
        return view('treballs.show', array('id'=>$id));
    }

    public function getCreateTreball(){
        return view('treballs.create');
    }

    public function getEditTreball($id){
        return view('treballs.edit', array('id'=>$id));
    }
}
