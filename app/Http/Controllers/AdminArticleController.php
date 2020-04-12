<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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
       /* $post = array(
            post_name => $request->input('post_name'),
            post_title => $request->input('post_title'),
            post_content => $request->input('post_content'),
            user_id => $request->input('user_id'),
            post_category => $request->input('post_category')
        );


        $post::create($post); //persist the data
        return redirect()->route('admin.admin')->with('info','l\'article a été rajouter avec succées');*/
        //dd($request->all());
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
            //dd($post_date);
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
        //dd($post);
        return redirect()->route('article_show', ["post_name" => $request->input("nomAut")])
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
    public function edit($id)
    {

        $post = Post::find($id);
        return view('admin.admin_edit',['post'=> $post]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
/*
        $post = Post::find($request->input('id'));

        $post->post_name = $request->input('post_name');
        $post->post_title = $request->input('post_title ');
        $post->post_content = $request->input('post_content');
        $post->post_content = $request->input('post_status');
        $post->post_date = $request->input('post_date');
        $post->user_id = $request->input('user_id');
        $post->post_category = $request->input('post_category');
        $post->save(); //persist the data
        return redirect()->route('admin')->with('info','l\'article a été mise à jour avec succées');
*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.admin');

    }
}
