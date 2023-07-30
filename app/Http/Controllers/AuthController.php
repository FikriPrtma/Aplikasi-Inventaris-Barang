<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }

    public function postRegister(Request $request){
        $validate = $request->validate([
            'email'    => 'required|max:64|unique:users',
            'password' => 'required|max:32|min:5',
            'nama'     => 'required|max:64',
        ]);

        DB::transaction(function() use($validate) {
            $user = User::create([
                'nama'     => $validate['nama'],
                'email'    => $validate['email'],
                'password' => bcrypt($validate['password']),
            ]);
        });

        return redirect('/login')->with('asuccess', 'Berhasil mendaftar! Anda dapat masuk menggunakan akun yang telah dibuat.');
    }

    public function login(){
        return view('login');
    }

    public function postLogin(Request $request){
        $validate = $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Email atau Kata sandi salah!')->withInput();
    }

    public function postLogout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
