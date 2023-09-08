<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function Index()
    {
        $admin = DB::table('users')->where('role','=','admin')->get();
        return view('v_admin_dashboard', compact('admin'));
        
    }
}
