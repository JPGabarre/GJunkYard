<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Rol;
use DB;

class UsersController extends Controller
{
    public function getUsers()
    {
        $user = User::all();

        return view('users.index',array('arrayUsers'=>$user));
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = User::where('nom', 'like', '%'.$query.'%')
         ->orWhere('cognoms', 'like', '%'.$query.'%')
         ->orWhere('email', 'like', '%'.$query.'%')
         ->orderBy('id', 'asc')
         ->get();
      }
      else
      {
       $data = User::orderBy('id', 'asc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
            <td>'.$row->nom.'</td>
            <td>'.$row->cognoms.'</td>
            <td>'.$row->email.'</td>
            <td>'.$row->rols->nom.'</td>
            <td>
                <a class="btn btn-info" href="users/show/'.$row->id.'">Mostrar</a>
                <a class="btn btn-primary" href="users/edit/'.$row->id.'">Editar</a>
                <form action="users/delete/'.$row->id.'" method="POST" style="display:inline; float:right; margin-right:5px;">
                    <button type="submit" class="btn btn-danger" style="display:inline">
                        Eliminar
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

    public function getUser($id){
        $user = User::findOrFail($id);

        return view('users.show', array('user'=>$user));
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
