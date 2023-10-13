<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit= $request->input('perPage') ?? 10;
        // $factures=Facture::paginate($limit);
        $produits = Produit::all();
        $produits=Produit::paginate($limit);
        return view('products',compact('produits'));

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
         $validated = $request->validate([
        'produit' => 'required',
        'prix' => 'required',
        'unite' => 'required',
        'description' => 'max:50'

    ]);

    $produit=Produit::create([
        'nom' =>  $request->produit,
        'code_produit' =>  $request->code_produit,
        'prix' => $request->prix,
        'unite' => $request->unite,
        'description'=> $request->description
    ]);
    return redirect()->route('product');
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
        $produit=Produit::find($id);
        return view('updateproduct',compact('produit'));
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
        $produit=Produit::find($id);


            $produit->nom=  $request->produit;
             $produit->code_produit= $request->code_produit;
             $produit->prix = $request->prix;
             $produit->unite= $request->unite;
             $produit->description= $request->description;

            $produit->save();
       // return redirect()->route('client');
       return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_delete= Produit::find($id);
        // $product_delete->delete();

        // return redirect()->route('product');

        $produit=$product_delete->produit_facture;

        if(count($produit)==0){
            $product_delete->delete();
        }
    return redirect()->route('product');


    }
}
