<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comments;

class CommentsController extends Controller
{
    public function index( int $user_id, int $article_id)
    {
        $current_article = Post::where("id", $article_id)->first();
        // Check that the current user is the owner of the article
        if($current_article && $current_article->user_id == $user_id )
        {
            $comments = Comments::where('post_id',$article_id)->get();

            return view('user_comment', array(
                'comments' => $comments,
                'user_id' => $user_id
            ));
        }
        return abort(403, "Erreur vous n'avez pas le droit de gerer les commentaires cet article !");
    }

    // validation et enregistrer le commentaire dans la base de données
    public function store(Request $request, int $article_id){
        $sucess = $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'texte' => 'required'
        ]);
        Comments::create([
            'comment_name'=>request('nom'),
            'post_id' => $article_id,
            'comment_email' => request('email'),
            'comment_content' => request('texte'),
            'comment_date' => now()
        ]);

        return back();
    }

    public function destroy($user_id, $article_id, $comment_id)
    {
        $post = Post::where("id", $article_id)->first();
        // Check that the current user is the owner of the article
        if($post->user_id == $user_id )
        {
            $comment = Comments::where(['id'=>$comment_id,'post_id'=>$article_id])->first();
            $comment->delete();
            return back();
        }
        return abort(403, "Vous n'avez pas le droit de supprimer ce commentaire !");
    }
}
