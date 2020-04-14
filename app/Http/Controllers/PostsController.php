<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    function index(){

        //récupérer tous les articles et les passer au view 'article.blade.php'
        $posts = \App\Post::all();
        return view('article',array(
            'posts' => $posts
        ));
    }

    public function show($post_id) {
        $post = \App\Post::where('id',$post_id)->first(); //récupérer le premier post si l'id == $post_id
        return view('post_single',array( //Passer le post au view 'post_single.blade.php
            'post' => $post
        ));
    }
}
