<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getUser(User $user)
    {
//        dd('tadaiJAAAAAAAAAANG \:"v/');
        $dataUser = $user->get();
       
       return view('Test', compact('dataUser'));
    }
    public function saveUser()
    {
    }
    public function deleteUser()
    {
    }
    public function updateUser()
    {
    }//
}
