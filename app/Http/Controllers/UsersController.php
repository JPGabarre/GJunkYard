<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;

class UsersController extends Controller
{
    public function getUsers(){
        $user = User::all();

        return view('users.index',array('arrayUsers'=>$user));
    }

    public function getUser($id){
        return view('users.show', array('id'=>$id));
    }

    public function getCreateUser(){
        $rol = Rol::all();

        return view('users.create',array('arrayRols'=>$rol));
    }

    public function postCreateUser(Request $request)
    {
        $DNI = $request->input('DNI');
        $nom = $request->input('nom');
        $cognoms = $request->input('cognoms');
        $telefon = $request->input('telefon');
        $email = $request->input('email');
        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');
        $id_rol = $request->input('id_rol');

        if($pass1 == $pass2){
            $p = new User;
            $p->DNI = $DNI;
            $p->nom = $nom;
            $p->cognoms = $cognoms;
            $p->telefon = $telefon;
            $p->email = $email;
            $p->password = bcrypt($pass1);
            $p->id_rol = $id_rol;
            $p->save();
        }

        return redirect('/users');
    }

    public function getEditUser($id){
        $user = User::findOrFail($id);
        $rol = Rol::all();

        return view('users.edit', array('user'=>$user) ,array('arrayRols'=>$rol));
    }

    
    public function putEditUser(Request $request, $id)
    {

        $pass1 = $request->input('pass1');
        $pass2 = $request->input('pass2');

        if(isset($pass1) && isset($pass2)){
            if($pass1 == $pass2){
                $p = new User;
                $o = $p -> findOrFail($id);
                $o->DNI = $request->input('DNI');
                $o->nom = $request->input('nom');
                $o->cognoms = $request->input('cognoms');
                $o->telefon = $request->input('telefon');
                $o->email = $request->input('email');
                $o->password = bcrypt($pass1);
                $o->id_rol = $request->input('id_rol');
                $o->save();
            }
        }else{
            $p = new User;
            $o = $p -> findOrFail($id);
            $o->DNI = $request->input('DNI');
            $o->nom = $request->input('nom');
            $o->cognoms = $request->input('cognoms');
            $o->telefon = $request->input('telefon');
            $o->email = $request->input('email');
            $o->id_rol = $request->input('id_rol');
            $o->save();
        }

        $user = User::findOrFail($id);
        
        return redirect('/users/show/'.$id);
    }

    public function deleteUser($id)
    {

        $p = new User;
        $o = $p -> findOrFail($id);
        $o->delete();

        return redirect('/users');
    }

}
