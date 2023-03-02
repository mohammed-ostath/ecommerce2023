<?php

namespace App\Http\Controllers\Address;

use App\Models\Citie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countrie;
use App\Models\State;

class CitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities=Citie::all();
        return view('pages.address.citie.index',[
            'cities'=>$cities,
            'states'=>State::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=Citie::all();
        return view('pages.address.citie.create',[
            'cities'=>$cities,
            'states'=>State::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Citie::create([
            'name'=>$request->name,
            'status'=>$request->status,
            'state_id'=>$request->state_id
        ]);
        return redirect()->route('cities.index')->with([
            'success'=>'This Citie Create success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citie  $citie
     * @return \Illuminate\Http\Response
     */
    public function show(Citie $citie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citie  $citie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citie=Citie::find($id);
        return view('pages.address.citie.edit',[
            'citie'=>$citie,
            'state'=>State::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citie  $citie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citie $citie)
    {
       $citie= Citie::find($request->id);
       $citie->update([
        'name'=>$request->name,
        'status'=>$request->status,
       ]);
       return redirect()->route('cities.index')->with([
        'success'=>'This Citie Update success'
    ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citie  $citie
     * @return \Illuminate\Http\Response
     */
public function destroy(Request $request)
    {
        Citie::destroy($request->id);
        return redirect()->back()->with([
            'success'=> 'DELETE success'
        ]);
    }
}
