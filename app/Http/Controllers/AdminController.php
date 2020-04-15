<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function index(){
        if ( Auth::check() ) {
            return view('admin.admin',array(
            ));
        }
        return back();
    }
}