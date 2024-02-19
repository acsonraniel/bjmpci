<?php

namespace App\Http\Controllers;

use App\Models\Crime;
use App\Models\Code;
use Illuminate\Http\Request;

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
            'minYear' => 'required',
            'minMonth' => 'required',
            'maxDay' => 'required',
            'maxYear' => 'required',
            'maxMonth' => 'required',
            'maxDay' => 'required',
            'bailable' => 'required',
        ]);

        $Crime = Crime::create($validatedData);
        return redirect('crime')->with('flash_message','Crime added succesfuly!');
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
        //
    }
}
