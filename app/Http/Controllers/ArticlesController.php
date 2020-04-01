<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    function index(){
        $posts = \App\Post::all();
        return view('article',array(
            'posts' => $posts
        ));
    }
}
