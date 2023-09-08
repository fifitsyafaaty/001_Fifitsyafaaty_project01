<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    function Index()
    {
        $mahasiswa = DB::table('users')->where('role','=','mahasiswa')->get();
        return view('v_mahasiswa_dashboard', compact('mahasiswa'));
        
    }
}
