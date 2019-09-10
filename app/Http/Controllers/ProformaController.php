<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductDetail;
use App\Proforma;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProformaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Proformas = User::find(Auth::id())->Proforma;
        return view('pages/proformas/proforma', compact('Proformas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = User::find(Auth::id())->Product;
        $Proformas = User::find(Auth::id())->Proforma;
        $buyers = User::find(Auth::id())->Buyer;
        $sellers = User::find(Auth::id())->Seller;

        $buyerBanks = User::find(Auth::id())->BuyerBank;
        return view('pages/proformas/newProforma',compact('products','Proformas','buyers','sellers','buyerBanks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'seller'=> 'required',
            'buyer'=> 'required',
            'invoice_no'=> 'required',
            'invoice_date'=> 'required',
            'method_of_dispatch'=> 'required',
            'port_of_loading'=> 'required',
            'port_of_discharge'=> 'required',
            'type_of_shipment'=> 'required',
            'method_of_payment'=> 'required',
            'delivery_date'=> 'required',
        ]);

        $proforma = new Product();

        $proforma->buyer_name = $request->buyer ;
        $proforma->seller_name = $request->seller ;
        $proforma->invoice_no = $request-> invoice_no;
        $proforma->invoice_date = $request->invoice_date;
        $proforma->delivery_date = $request->delivery_date ;
        $proforma->method_of_shipping = $request->method_of_dispatch;
        $proforma->port_of_loading = $request->port_of_loading;
        $proforma->port_of_discharge = $request->port_of_discharge;

        $proforma->save();

        $ids = $request->ids;



        foreach ($ids as $id){
            $productDetail = new ProductDetail();

//            $productDetail->code_sku = User::find(Auth::id())->Product->id();

            dd(User::find(Auth::id())->Product->id());
        }

//        $table->string('code_sku');
//        $table->string('description');
//        $table->string('quantity');
//        $table->string('unit');
//        $table->string('hs_code');
//        $table->string('gross_weight');
//        $table->string('country_of_origin');
//        $table->string('price');
//        $table->string('product_name');
//        $table->string('amount');
//        $table->string('proforma_id');
//
//
//        dd($proforma->ProductDetail);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function show(Proforma $proforma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function edit(Proforma $proforma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proforma $proforma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proforma  $proforma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proforma $proforma)
    {
        //
    }
}
