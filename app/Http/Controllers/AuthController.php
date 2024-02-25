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

        return view('admin.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'username'=>'required|username',
            'password'=>'required'
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if(auth()->attempt($credentials)){
            if(auth()->user()->is_user){
                return redirect()->route('crime');
            } else {
                auth()->logout();
                return redirect()->back()->with('error','You have to be admin to access this page.');
            }
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
