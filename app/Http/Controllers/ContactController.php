<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

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
        
        Contact::create([
                'contact_name'=>request('nom'),
                'contact_email' => request('email'),
                'contact_message' => request('texte'),
                'contact_date' => now()
        ]);
    
        return view('confirm', $sucess);

    }
}
