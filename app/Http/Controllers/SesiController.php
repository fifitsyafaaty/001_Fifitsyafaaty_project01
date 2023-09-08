<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SesiController extends Controller
{
    function index()
    {

        $index = DB::table('users')->where('role','=','mahasiswa')->get();
        return view('v_mahasiswa_dashboard', compact('index'));
    }

    function login()
    {
        return view('v_login');
    }
    function login_proses(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ], [
            'email.required'=>'Email wajib diisi',
            'password.required'=>'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'mahasiswa'){
                return redirect('/mahasiswa');
            }elseif(Auth::user()->role == 'admin'){
                return redirect('/admin');
            }elseif(Auth::user()->role == 'dosen'){
                return redirect('/dosen');
            }
        }else{
            return redirect('login')->withErrors('Email dan Password yang dimasukkan tidak valid. Silahkan coba lagi')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }

}
