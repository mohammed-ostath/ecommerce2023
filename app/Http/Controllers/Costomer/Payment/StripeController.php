<?php

namespace App\Http\Controllers\Costomer\Payment;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Order;
use App\Models\Product;
use App\Models\Costomer;
use Illuminate\Http\Request;
use App\Models\Costumer_address;
use App\Http\Controllers\Controller;
use Stripe\Customer;

class StripeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totel=Order::count();
        return view('temp.payment.stripe',[
            'products'=>Product::all(),
            'orders'=>Order::all(),
            'totel'=>$totel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $costomer =Customer::create([
            'address'=>Costumer_address::all(),
            'email'=>auth('costomer')->user()->email,
            'name'=>auth()->user()->name,
            // 'source' => $request->stripeToken
        ]);

        Charge::create([
            'amount'=>$request->amount,
            'description'=>'this payment Stripe',
            'customer'=>$costomer->id,
            'shipping'=>[
                // 'address'=>Costumer_address::all(),
                // 'name'=>auth('costomer')->user()->id,
            ]
        ]);

        return redirect()->back()->with([
            'success'=>'Payment successful!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
