<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Code;
use App\Models\Region;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $codes = Code::all();
        $regions = Region::all();
        $offices = Office::all();

        return view('admin.user',[
            'users'=>$users,
            'codes'=>$codes,
            'regions'=>$regions,
            'offices'=>$offices,
            'title'=>'Users'
        ]);
    }

    public function getOffices($regionId)
    {
        $offices = Office::where('region', $regionId)->get();
        return response()->json($offices);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rank' => 'required',
            'name' => 'required',
            'region' => 'required',
            'office' => 'required',
            'username' => 'required',
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,])[A-Za-z\d@$!%*?&.,]+$/'
            ],
            'role' => 'required',
            'is_user' => 'required'
        ], [
            'rank.required' => 'Rank required.',
            'name.required' => 'Please provide a name.',
            'region.required' => 'Please select a region.',
            'office.required' => 'Please select an office.',
            'username.required' => 'Please provide a username.',
            'password.required' => 'Please provide a password.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            'role.required' => 'Please select a user type.',
            'is_user.required' => 'Please select a status.',
        ]);
    
        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Create the user
        $user = User::create($validatedData);
    
        return response()->json(['success' => true]);
        
    }
}
