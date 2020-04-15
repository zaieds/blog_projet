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
    public function showUserArticle(Request $request, $user_id, $article_id)
    {
        $post = \App\Post::where(['user_id'=>$user_id, "id"=>$article_id ])->first(); //get first post with id == $post_id
        return view('post_single',array( //Pass the post to the view
        'post' => $post
    ));
    }
    public function showUserArticles(Request $request, $user_id)
    {
        $posts = \App\Post::where('user_id',$user_id)
            ->orderBy('name', 'desc')
            ->get();

        return view('article',array(
            'user_id' => $user_id,
            'posts' => $posts
        ));
    }
}
