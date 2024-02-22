<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Code;
use App\Models\Region;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade


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
            'password' => 'required',
            'role' => 'required',

        ]);

        // Hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create the user
        $user = User::create($validatedData);

        return redirect('user')->with('flash_message','User added succesfuly!');
    }
}
