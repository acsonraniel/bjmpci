<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Code;
use App\Models\Region;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
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

    public function update(Request $request, $id)
    {
        // Find the code item by ID
        $user = User::findOrFail($id);
        
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'rank' => 'required',
            'name' => 'required',
            'region' => 'required',
            'office' => 'required',
            'username' => 'required',
            // 'password' => [
            //     'string',
            //     'min:8',
            //     'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,])[A-Za-z\d@$!%*?&.,]+$/'
            // ],
            'role' => 'required',
            'is_user' => 'required',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            // Return JSON response with validation errors
            return response()->json(['errors' => $validator->errors()], 422);
        }

        
        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, prepare the error message
            $errorMessage = 'User update failed:';
            if ($validator->errors()->has('rank')) {
                $errorMessage .= ' Rank field is missing.';
            }
            if ($validator->errors()->has('name')) {
                $errorMessage .= ' Name field is missing.';
            }
            if ($validator->errors()->has('region')) {
                $errorMessage .= ' Region field is missing.';
            }
            if ($validator->errors()->has('office')) {
                $errorMessage .= ' Office field is missing.';
            }
            if ($validator->errors()->has('username')) {
                $errorMessage .= ' Username field is missing.';
            }
            if ($validator->errors()->has('role')) {
                $errorMessage .= ' User type field is missing.';
            }
            if ($validator->errors()->has('is_user')) {
                $errorMessage .= ' User status field is missing.';
            }
            
            // Redirect back with errors and input
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $errorMessage);
        }

        // Update password if provided and meets complexity requirements
        if ($request->filled('password')) {
            $passwordValidator = Validator::make($request->all(), [
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&.,])[A-Za-z\d@$!%*?&.,]+$/'
                ],
            ]);

            if ($passwordValidator->fails()) {
                // If password fails complexity validation, return with error
                return redirect()->back()->withErrors($passwordValidator)->withInput()->with('error', 'Password complexity not met.');
            }

            // Update password
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        // Update the user without password
        $user->update([
            'rank' => $request->rank,
            'name' => $request->name,
            'region' => $request->region,
            'office' => $request->office,
            'username' => $request->username,
            'role' => $request->role,
            'is_user' => $request->is_user,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully');
    }
}
