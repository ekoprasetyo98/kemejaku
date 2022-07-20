<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // ambil data user yang sedang login
        $user = User::where('id', Auth::user()->id)->first();
        return view('profil/index',['data'=>$user]);
    }
}
