<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminArticleController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Show all posts from the database and return to view
        $posts = \App\Post::all();
        return view('admin.admin_articles',array(
            'posts' => $posts
        ));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.admin_create');
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomArt' => 'required',
            'nomAut' => 'required',
            'contenus' => 'required',
            'user_id' => 'required',
            'post_category' => 'required',
        ]);
        $post_status= "0";
        $post_date = null;
        if( !empty($request->input('post_status')) )
        {
            $post_status = "1";
            $timezone    = new \DateTimeZone('Europe/Rome');
            $post_date = (new \DateTime("now", $timezone))->format("Y-m-d H:i:s");
        }
        $post = new  Post();
        $post->user_id = $request->input("user_id");
        $post->post_date =$post_date;
        $post->post_content= $request->input("contenus");
        $post->post_title = $request->input("nomArt");
        $post->post_status = $post_status;
        $post->post_name = $request->input("nomAut");
        $post->post_category = $request->input("post_category");
        $post->post_type = $request->input("post_category");
        $post->save();
        return redirect()->route('article_show', ["post_id" => $post->id])
            ->with('success','l\'article a été créer avec succées.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($article)
    {
        $post = Post::find(['id'=> $article])->first();
        return view('admin.admin_article_edit',['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $article id of the article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $article)
    {
        $data = $request->all();
        $post = Post::find(['id'=> $article])->first();
        if( !$post->post_date)
        {
            // Si l'utilisateur coche 'publier l'article' et la publication n'a pas deja été faite
            // alors on definit la date de publication à aujourd'hui
            if($data['post_status']===true &&
                ($post->post_status == null || $post->post_status == "0" )
            )
            {
                $timezone    = new \DateTimeZone('Europe/Rome');
                $post_date = (new \DateTime("now", $timezone))->format("Y-m-d H:i:s");
                $post->post_date = $post_date;
            }
        }
        $post->post_name = $data['post_name'];
        $post->post_title = $data['post_title'];
        $post->post_content = $data['post_content'];
        $post->post_status = $data['post_status']==true? "1": "0";
        $post->user_id = $data['post_userId'];
        $post->post_category = $data['post_category'];
        $success = $post->save(); //persist the data
        // Si $succes est à true afficher un message de réussite
        // Sinon dire que les changements n'ont pas pu être effectués
        return response()->json([
            'message' => 'l\'article a été mise à jour avec succées'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($article)
    {

//        $post = Post::find(['id'=> $article])->first();
//        $post->delete();
//        return redirect()->route('admin.admin_destroy');


//         $post = Post::findOrFail($article);
//        $post->delete();
//        return back();


        $post = Post::find($article);
        $post->delete();

        return redirect('/admin/articles')->with('success', 'Article supprimé !');

    }
}
