<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        return view('users.create');
    }

    public function getEditUser($id){
        return view('users.edit', array('id'=>$id));
    }
}
