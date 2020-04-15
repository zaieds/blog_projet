<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    function indexArticles(Request $request, $user_id){
        //Show all posts from the database and return to view
        $posts = \App\Post::where('user_id',$user_id)
            ->orderBy('name', 'desc')
            ->get();
        return view('admin.admin_articles',array(
            'user_id' => $user_id,
            'posts' => $posts
        ));
    }
    function indexComments(Request $request, $user_id){
        dd("Commentaires => ".$user_id);
        //²&return view('admin.admin');
    }
}
