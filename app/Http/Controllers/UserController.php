<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(){
        return view('user');
    }

    public function getInfos()
    {
        return view('user');
    }

    public function postInfos(Request $request)
    {
        return 'Le nom est ' . $request->input('nom');
    }
}
