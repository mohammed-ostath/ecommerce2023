<?php

namespace App\Http\Controllers\Costomer\Address;

use Illuminate\Http\Request;
use App\Models\Costumer_address;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Citie;
use App\Models\Countrie;
use App\Models\Order;
use App\Models\Product;
use App\Models\State;

class CostumerAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costomer_address=Costumer_address::all();
        return view('temp.checkout',[
            'costomer_address'=>$costomer_address,
            'categories'=>Categorie::all(),
            'countries'=>Countrie::all(),
            'cities'=>Citie::all(),
            'states'=>State::all(),
            'products'=>Product::all(),
            'orders'=>Order::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costomer_address=Costumer_address::all();
        return view('temp.checkout',[
            'costomer_address'=>$costomer_address,
            'categories'=>Categorie::all(),
            'countries'=>Countrie::all(),
            'cities'=>Citie::all(),
            'states'=>State::all()
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
        Costumer_address::create([
            'costomer_id'=>$request->costomer_id,
            'countrie_id'=>$request->countrie_id,
            'state_id'=>$request->state_id,
            'citie_id'=>$request->citie_id,
            'address_title'=>$request->address_title,
            'default_address'=>$request->default_address,
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'zib_code'=>$request->zib_code,
            'po_box'=>$request->po_box,
        ]);

        return redirect()->back()->with([
            'success'=>'The Address Create success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function show(Costumer_address $costumer_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function edit(Costumer_address $costumer_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costumer_address $costumer_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costumer_address  $costumer_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costumer_address $costumer_address)
    {
        //
    }
}
