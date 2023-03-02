<?php

namespace App\Http\Controllers\Address;
use App\Models\Countrie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class CountrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $countries=Countrie::all();
        return view('pages.address.countrie.index',[
            'countries'=>$countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Countrie::all();
        return view('pages.address.countrie.create',[
            'countries'=>$countries
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
        Countrie::create([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('countries.index')->with(['success'=>'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function show(Countrie $countrie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $countrie=Countrie::find($id);
        return view('pages.address.countrie.edit',[
            'countrie'=>$countrie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countrie $countrie)
    {
        $countrie=Countrie::find($request->id);
        $countrie->update([
            'name'=>$request->name,
            'status'=>$request->status
        ]);
        return redirect()->route('countries.index')->with([
            'success'=>'Successfully'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Countrie::destroy($request->id);
        return redirect()->back()->with([
            'warning'=>'Delete'
        ]);
    }
}
