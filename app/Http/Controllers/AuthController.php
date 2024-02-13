<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//allows hashing of password
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin(){    
        // $pass = "admin123";
        // $passhash = Hash::make($pass);
        // echo $passhash;

        return view('admin.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'username'=>'required|username',
            'password'=>'required'
        ]);
 
        $validated=auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password,
            'is_admin'=>1
        ],$request->password);
 
        if($validated){
            return redirect()->route('crime');
        }else{
            return redirect()->back()->with('error','Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

}
