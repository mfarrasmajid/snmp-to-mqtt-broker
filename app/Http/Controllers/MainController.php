<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware(['ceklogin', 'session']);
    }

    public function dashboard (Request $request){
        $data = '';
        return view('dashboard.dashboard', compact('data'));
    }
}
