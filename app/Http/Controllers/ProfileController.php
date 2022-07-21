<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

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

    public function update(Request $request){
        $this->validate($request,[
            'password'=>'confirmed'
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        if (!empty($request->password)) {
            # code...
            $user->password = Hash::make($request->password);
        }

        $user->update();
        return redirect('/profile');

    }
}
