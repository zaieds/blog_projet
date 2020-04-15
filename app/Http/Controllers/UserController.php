<?php

namespace App\Http\Controllers;
use app\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if (Auth::check() && mb_strtolower(Auth::user()->role) == "admin") {
            //Show all posts from the database and return to view
            $users = \App\User::all();
            return view('admin.admin_user', array(
                'users' => $users
            ));
       // }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'nomUser' => 'required',
            'emailUser' => 'required',
            'password' => 'required',
        ]);

        $user = new  User();

        $user->name = $request->input("nomUser");
        $user->email = $request->input("emailUser");
        $user->password = bcrypt($request->input("password"));
        $user->save();
        return redirect()->route('index_user')
            ->with('success', 'l\'article a été créer avec succées.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $post = User::find(['id'=> $id])->first();

        if(isset($data[name]))
        $post->name = $data['name'];
        if(isset($data['email']))
        $post->email = $data['email'];
        if(isset($data['password']))
        $post->password = bcrypt($data['password']);

        $post->save();
        return response()->json([
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = User::findOrFail($id);
        $post->delete();
   return back();

    }
}


