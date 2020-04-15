<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = \App\Post::orderBy('id','desc')->take(3)->get();//récupérer les 3 derniers articles
        return view('welcome',array(//passer les 3 articles au view "welcome.blade.php"
            'posts' => $posts
        ));
        //return view('home');
    }
}
