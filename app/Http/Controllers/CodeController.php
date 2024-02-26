<?php

namespace App\Http\Controllers;

use App\Models\Code;
use App\Models\Region;
use App\Models\Office;
use App\Models\User;
use App\Models\Crime;
use Illuminate\Http\Request;
use App\Models\OtherModel;
use Illuminate\Support\Facades\DB;

class CodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $codes = Code::all();
        return view('admin.code',['codes'=> $codes, 'title'=>'System Codes'] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'category' => 'required',
            'value' => 'required',
            'description' => 'nullable'
        ]);
    
        // Store the data
        $code = Code::create($validatedData);
    
        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function edit(Code $code)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'category' => 'required',
            'value' => 'required',
            'description' => 'nullable',
        ]);
    
        // Find the code item by ID
        $code = Code::findOrFail($id);
    
        // Update the code
        $code->update([
            'category' => $request->category,
            'value' => $request->value,
            'description' => $request->description,
        ]);
    
        // Return a JSON response indicating success
        return redirect()->route('code.index')->with('success', 'Code updated successfully');
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Code  $code
     * @return \Illuminate\Http\Response
     */

     public function destroy(Code $code)
     {
         // Check if the code is being used in tbl_region
         $isUsedInRegion = DB::table('tbl_region')->where('rank', $code->id)->exists();
     
         // Check if the code is being used in tbl_user
         $isUsedInUser = DB::table('tbl_users')->where('rank', $code->id)->exists();
     
         // Check if the code is being used in tbl_crime
         $isUsedInCrime = DB::table('tbl_crime')->where('type', $code->id)->orWhere('group', $code->id)->exists();
     
         // If the code is being used in any of the tables, prevent deletion
         if ($isUsedInRegion || $isUsedInUser || $isUsedInCrime) {
             return redirect()->back()->with('error', 'Cannot delete this code. It is being used in other tables.');
         }
     
         // If the code is not being used, proceed with deletion
         $code->delete();
         return redirect()->route('code.index')->with('success', 'Code deleted successfully');
     }
     
}
