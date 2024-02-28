<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::all();
        $regions = Region::orderBy('id', 'asc')->get();

        return view('admin.office',['offices'=>$offices,'regions'=>$regions,'title'=>'Offices']);
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
        //
        $validatedData = $request->validate([
            'region' => 'required',
            'office' => 'required',
            'abbrev' => 'required',
            'officer' => 'nullable'
        ]);

        // Store the data
        $office = Office::create($validatedData);
    
        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the code item by ID
        $office = Office::findOrFail($id);
    
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'region' => 'required',
            'office' => 'required',
            'abbrev' => 'required',
            'officer' => 'nullable',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, prepare the error message
            $errorMessage = 'Office update failed:';
            if ($validator->errors()->has('region')) {
                $errorMessage .= ' Region field is missing.';
            }
            if ($validator->errors()->has('office')) {
                $errorMessage .= ' Office field is missing.';
            }
            if ($validator->errors()->has('abbrev')) {
                $errorMessage .= ' Abbreviation field is missing.';
            }
    
            // Redirect back with errors and input
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $errorMessage);
        }
    
        // Update the code
        $office->update([
            'region' => $request->region,
            'office' => $request->office,
            'abbrev' => $request->abbrev,
            'officer' => $request->officer,
        ]);
    
        return redirect()->route('office.index')->with('success', 'Office updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        // Check if the code is being used in tbl_user
        $isUsedInUser = DB::table('tbl_users')->where('office', $office->id)->exists();
    
        // If the code is being used in any of the tables, prevent deletion
        if ($isUsedInUser) {
            return redirect()->back()->with('error', 'Cannot delete this code. It is being used in other tables.');
        }
    
        // If the code is not being used, proceed with deletion
        $office->delete();
        return redirect()->route('office.index')->with('success', 'Code deleted successfully');
    }
}
