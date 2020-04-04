<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;

class CommentsController extends Controller
{
    
    public function store(Post $post){
        Comments::create([
            'comment_name'=>request('nom'),
            'post_id' => $post->id,
            'comment_email' => request('email'),
            'comment_content' => request('texte'),
            'comment_date' => now()
        ]);

        return back();
    }
}
