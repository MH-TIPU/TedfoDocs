<?php

namespace App\Http\Controllers;

use App\Catalogue;
use App\CatalogueItem;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class CatalogueController extends Controller
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
        $catagogues = User::find(Auth::id())->Catalogue;
        return view('pages/catalogues/catalogue', compact('catagogues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = User::find(Auth::id())->Product;

        return view('pages/catalogues/newCatalogue',compact('products'));
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
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'factory_address'=> 'required',
            'company_address'=> 'required',
        ]);

        $catalogue = new Catalogue();

        $catalogue->name = $request->name;
        $catalogue->email = $request->email;
        $catalogue->phone = $request->phone;
        $catalogue->factory_address = $request->factory_address;
        $catalogue->company_address = $request->company_address;

        $catalogue->user_id = Auth::id();


        $catalogue->save();
            for($i = 0; $i < sizeof($request->ids);$i++){

                $catalogueItem = new CatalogueItem();
                $id = $request->ids[$i];
                $product = Product::find($id);
                $catalogueItem->code_sku = $product->code_sku;
                $catalogueItem->photo = $product->photo;
                $catalogueItem->description = $product->description;
                $catalogueItem->moq = $request->get('moqs'.$id);
                $catalogueItem->price = $request->get('prices'.$id);

                $catalogueItem->catalogue_id = $catalogue->id;

                $catalogueItem->save();
            }



            return redirect('catalogue');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $catalogue = Catalogue::find($id);

        $catalogueItems = $catalogue->CatalogueItem;

        //dd($catalogueItems);
        return view('pages/catalogues/viewCatalogue',compact('catalogueItems','catalogue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function edit(Catalogue $catalogue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalogue $catalogue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Catalogue  $catalogue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalogue $catalogue)
    {

        $catalogueItems = $catalogue->CatalogueItem;
        foreach ($catalogueItems as $catalogueItem){
            $catalogueItem->delete();
        }
        $catalogue->delete();
        return redirect('catalogue');
    }
}
