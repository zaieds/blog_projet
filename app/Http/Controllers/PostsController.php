<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    function index(){

        //Show all articles from the database and return to view
        $posts = \App\Post::all();
        return view('article',array(
            'posts' => $posts
        ));
    }

    public function show($post_id) {
        $post = \App\Post::where('id',$post_id)->first(); //get first post with id == $post_id
        return view('post_single',array( //Pass the post to the view
            'post' => $post
        ));
    }
}
