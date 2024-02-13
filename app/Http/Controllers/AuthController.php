<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

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
 
        $validated=auth()->attempt([
            'username'=>$request->username,
            'password'=>$request->password,
            'is_admin'=>1
        ],$request->password);
 
        if($validated){
            return redirect()->route('dashboard')->with('success','Login Successfull');
        }else{
            return redirect()->back()->with('error','Invalid credentials');
        }
    }

}
