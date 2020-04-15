<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Contracts\Auth\PasswordBrokerFactory;
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
        if (Auth::check() && mb_strtolower(Auth::user()->role) == "admin") {
            //Show all posts from the database and return to view
            $users = \App\User::all();
            return view('admin.admin_user', array(
                'users' => $users
            ));
        }
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
        //var_dump($request);
        $request->validate([
            'nomUser' => 'required',
            'emailUser' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = new User();
        $user->name = $request->input('nomUser');
        $user->email = $request->input('emailUser');
        $user->role = $request['role']==true? "admin": "user";
        $user->password = bcrypt($request->input('password'));
        $user->email_verified_at = now();
        $user->save();
        
        return back();
        /*return redirect()->route('admin_user', ["id" => $user->id])
            ->with('success', 'l\'article a été créer avec succées.');*/
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
        $user = User::find(['id'=> $id])->first();

        $user->name = $data['nomUser'];
        $user->email = $data['emailUser'];

        $user->save();
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
        $user = User::findOrFail($id);
        $user->delete();
        return back();

    }
}


