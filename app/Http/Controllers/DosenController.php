<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    function Index()
    {
        $dosen = DB::table('users')->where('role','=','dosen')->get();
        return view('v_dosen_dashboard', compact('dosen'));
    }
}
