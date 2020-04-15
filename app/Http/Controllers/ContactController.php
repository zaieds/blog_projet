<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /*function index(){
        return view('contact');
    }*/
    public function index()
    {
        if ( Auth::check() && mb_strtolower(Auth::user()->role) == "admin" ) {
            $contacts = \App\Contact::all();
            return view('admin/admin_contact', array(
                'contacts' => $contacts
            ));
        }
        return back();
        
    }

    //retourner le view du formulaire contact
    public function create()
    {
        return view('contact');
    }

    // validation et enregistrer la demande de contact dans la base de données
    public function store(Request $request)
    {
        $sucess = $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'text' => 'required'
        ]);
        
        Contact::create([
                'contact_name'=>request('nom'),
                'contact_email' => request('email'),
                'contact_message' => request('text'),
                //'contact_date' => now()
        ]);
    
        return view('confirm', $sucess);

    }

    public function destroy($contact)
    {
        $contact = Contact::find($contact);
        $contact->delete();

        return redirect('/admin/contact')->with('success', 'Contact supprimé !');
    }
}
