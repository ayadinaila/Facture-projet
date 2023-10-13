<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Client;
use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;
use App\Models\Factureproduit;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $user = Auth::user()->nom;
        // $factures=Facture::with('client','user')->get();
        // dd($factures);
        $limit= $request->input('perPage') ?? 10;
    //    $factures=Facture::paginate($limit);
       $factures=Facture::all();
       $factures=Facture::with('client','user')->paginate($limit);
        // $factures=Facture::paginate(4);
        // return $factures;
        return view('facture',compact('factures','user'));
    }
public function cancel(){
    redirect()->route('facture');
}
    public function addfacture()
    {    $produits = Produit::all();
        $clients=Client::all();
        return view('addfacture',
    [  'produits'=>$produits,
        'clients'=>$clients,
    ]);
    }



    public function affichage($id)
    {

        $facture=Facture::with('client','facture_produit.produit')->where('id',$id)->first();
        // dd($facture);

        return view('affichagefacture',compact('facture'));
    }

    public function approuve($id,Request $request)
    {
        $user = Auth::user()->nom;
        $facture=Facture::find($id);
        $facture->statut = 'Approuvé';
        $facture->save();

        $limit= $request->input('perPage') ?? 10;
        $factures=Facture::with('client')->paginate($limit);
    //    $factures=Facture::with('client')->paginate(4);
    return view('facture',compact('factures','user'));
    }

    public function nonapprouve($id,Request $request)

    {
            $user = Auth::user()->nom;
            $facture=Facture::find($id);
            $facture->statut = 'Rejeté';
            $facture->save();

            $limit= $request->input('perPage') ?? 10;
            $factures=Facture::with('client')->paginate($limit);
        //    $factures=Facture::with('client')->paginate(4);
        return view('facture',compact('factures','user'));

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
        // dd($request);
        $validated = $request->validate([
            'client_facture' => 'required',
            'produit_facture' => 'required',
            'type_facture' => 'required',
            'prix_final'=> 'required'
        ]);
            $facture=Facture::create([
                'id_client' =>  $request->client_facture,
                'type_facture' => $request->type_facture,
                'totale_ht'=> $request->prix_final,
                'totale_tva'=> $request->prix_tva,
                'totale_ttc'=> $request->prix_ttc,
                'statut'=> $request->statut_facture
                // 'id_user'=> Auth::user()->id

            ]);

            $facture->code_facture = str_pad($facture->id,6,'0',STR_PAD_LEFT)."-".date('m')."-".date('Y');
            // $facture->save();

            foreach ($request->produit_facture as $key => $value) {
                $product = Produit::find($value);

                Factureproduit::create([
                    'id_facture'=>$facture->id,
                    'id_produit'=>$product->id,
                    'montant'=>$request->prix_facture[$key],
                    'remise'=>$request->remise_facture[$key],
                    'totale_montant'=>$request->prix_final[$key],
                    'service'=>$request->prix_service[$key],
                    'quantite'=>$request->quantite_facture[$key]

                ]);

            }
 $facture->save();

       return redirect()->route('facture');

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
    {    $clients=Client::all();
        $produits=Produit::all();
         $facture=Facture::with('client','facture_produit.produit')->where('id',$id)->first();

        return view('updatefacture',compact('facture','clients','produits'));
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
        $facture=Facture::find($id);

        $facture->id_client=  $request->client_facture;
        $facture->type_facture= $request->type_facture;
        $facture->totale_ht = $request->prix_final;
        $facture->totale_tva= $request->prix_tva;
        $facture->totale_ttc= $request->prix_ttc;
        $facture->statut= $request->statut_facture;


        $products = $facture->facture_produit->map(function($val,$key){
            return $val->id_produit;
        });
        foreach ($request->produit_facture as $key => $value) {


            if(in_array($value,$products->all())){
                $product = Produit::find($value);
                $factureproduit=Factureproduit::firstWhere([['id_facture',$facture->id],['id_produit',$product->id]]);

            }
            else{
                $product = Produit::find($value);
                  Factureproduit::create([
                    'id_facture'=>$facture->id,
                    'id_produit'=>$product->id,
                    'montant'=>$request->prix_facture[$key],
                    'remise'=>$request->remise_facture[$key],
                    'totale_montant'=>$request->prix_final[$key],
                    'service'=>$request->prix_service[$key],
                    'quantite'=>$request->quantite_facture[$key]

                ]);
            }
        }
        foreach ($products->all() as $key => $value) {
            if(!in_array($value,$request->produit_facture)){
                Log::alert($value);
                $factureproduit=Factureproduit::firstWhere([['id_facture',$facture->id],['id_produit',$value]]);
                $factureproduit->delete();
            }

        }


        //  foreach ($request->produit_facture as $key => $value) {
        //     $product = Produit::find($value);
        // Factureproduit::updateOrCreate(




    //     );
    // }
        $facture->save();
   // return redirect()->route('client');
   return redirect()->route('facture');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $facture=Facture::find($id);
        $facture->delete();
        return redirect()->route('facture');
    }
}
