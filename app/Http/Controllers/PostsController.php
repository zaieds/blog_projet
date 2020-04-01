<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    function index(){

        return view('article');
    }

    public function show($post_name) {
        $post = \App\Post::where('post_name',$post_name)->first(); //get first post with post_nam == $post_name

        return view('post_single',array( //Pass the post to the view
            'post' => $post
        ));
    }


    /* function show($n){
         return view('article')->with('numero', $n);
     }*/
}
