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
        // Validate user inputs
        $request->validate([
            'username' => 'required|alpha_dash',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if(auth()->attempt($credentials)){
            if(auth()->user()->is_user){
                return redirect()->route('crime');
            } else {
                // Logout user if not admin
                Auth::logout();
                return redirect()->route('getLogin')->with('error', 'You must be an admin to access this page.');
            }
        } else {
            // Authentication failure
            return redirect()->route('getLogin')->with('error', 'Invalid username or password.');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('getLogin');
    }

}
