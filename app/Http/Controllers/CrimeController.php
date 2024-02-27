<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Code;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crimes = Crime::all();
        $codes = Code::all();

        return view('admin.crime',['crimes'=>$crimes,'codes'=>$codes,'title'=>'Crimes']);
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
            'type' => 'nullable',
            'group' => 'nullable',
            'crime' => 'required',
            'min_year' => 'nullable',
            'min_month' => 'nullable',
            'min_day' => 'nullable',
            'max_year' => 'nullable',
            'max_month' => 'nullable',
            'max_day' => 'nullable',
            'bailable' => 'nullable',
        ]);

        // Store the data
        $crime = Crime::create($validatedData);
    
        // Return a JSON response indicating success
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function show(Crime $crime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crime  $crime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        // // Check if the code is being used in tbl_user
        // $isUsedInUser = DB::table('tbl_users')->where('office', $office->id)->exists();
    
        // // If the code is being used in any of the tables, prevent deletion
        // if ($isUsedInUser) {
        //     return redirect()->back()->with('error', 'Cannot delete this code. It is being used in other tables.');
        // }
    
        // If the code is not being used, proceed with deletion
        $crime->delete();
        return redirect()->route('crime.index')->with('success', 'Crime deleted successfully');
    }
}
