<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::orderBy('id', 'asc')->get();
        $codes = Code::orderBy('id', 'asc')->get();

        return view('admin.region',['regions'=>$regions,'codes'=>$codes,'title'=>'Regions']);
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

        $validatedData = $request->validate([
            'region' => 'required',
            'rank' => 'nullable',
            'name' => 'nullable',
            'address' => 'nullable',
            'landline' => 'nullable'
        ]);

        // Store the data
        $region = Region::create($validatedData);
    
        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function show(Region $region)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function edit(Region $region)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Find the code item by ID
        $region = Region::findOrFail($id);
    
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'region' => 'required',
            'rank' => 'nullable',
            'name' => 'nullable',
            'address' => 'nullable',
            'landline' => 'nullable',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            // If validation fails, prepare the error message
            $errorMessage = 'Region update failed:';
            if ($validator->errors()->has('region')) {
                $errorMessage .= ' Region field is missing.';
            }
    
            // Redirect back with errors and input
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $errorMessage);
        }
    
        // Update the code
        $region->update([
            'region' => $request->region,
            'rank' => $request->rank,
            'name' => $request->name,
            'address' => $request->address,
            'landline' => $request->landline,
        ]);
    
        return redirect()->route('region.index')->with('success', 'Region updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Region  $region
     * @return \Illuminate\Http\Response
     */
    public function destroy(Region $region)
    {
        // Check if the code is being used in tbl_user
        $isUsedInUser = DB::table('tbl_users')->where('region', $region->id)->exists();

        // Check if the code is being used in tbl_user
        $isUsedInOffice = DB::table('tbl_office')->where('region', $region->id)->exists();
    
        // If the code is being used in any of the tables, prevent deletion
        if ($isUsedInUser || $isUsedInOffice) {
            return redirect()->back()->with('error', 'Cannot delete this region. It is being used in other tables.');
        }
    
        // If the code is not being used, proceed with deletion
        $region->delete();
        return redirect()->route('region.index')->with('success', 'Region deleted successfully');
    }
}
