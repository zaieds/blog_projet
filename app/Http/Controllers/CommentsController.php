<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;

class CommentsController extends Controller
{
    // validation et enregistrer le commentaire dans la base de données
    public function store(Request $request, Post $post){ 
        $sucess = $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'texte' => 'required'
        ]);

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
