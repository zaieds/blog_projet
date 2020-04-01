<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /*function index(){
        return view('contact');
    }*/
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $sucess = $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'texte' => 'required'
        ]);
        return view('confirm', $sucess);

    }
}
