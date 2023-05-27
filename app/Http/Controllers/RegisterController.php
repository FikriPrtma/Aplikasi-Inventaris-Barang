<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register/index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function store(Request $request){
        $request -> validate([
            'name' => 'required|min:5|max:255|unique:name',
            'email' => 'required|max:255|unique:email',
            'password' => 'required|min:8|max:255'
        ]);

        dd('registrasi berhasil!');
    }
}