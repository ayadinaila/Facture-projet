<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use Illuminate\Http\Request;

class ClientController extends Controller
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
        $clients = Client::all();
        $clients=Client::paginate($limit);
        return view('client',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addclient');
    }

    public function create2()
    {
        return view('addclient-boostrap');
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
            'type' => 'required',
            'entreprise' => 'required_if:type,professional|nullable',
            'email' => 'required_if:type,particular|email|unique:clients,email|nullable',
            'telephone' => 'required_if:type,particular|nullable',
            'email_pro' => 'required_if:type,professional|email|unique:clients,email|nullable',
            'telephone_pro' => 'required_if:type,professional|nullable',
            'registre_commerce' => 'required_if:type,professional|nullable|numeric',
            'ad_facturation' => 'required_if:type,professional|nullable',
            'ad_livraison' => 'required_if:type,professional',
            'First_Name' => 'required_if:type,particular|string|nullable',
            'Last_Name' => 'required_if:type,particular|nullable',
        ]);

     
        // dd($validated);


        // return redirect()->route('client');

        if( $request->type =='professional'){
             $client=Client::create([
            'type' =>  $request->type,
            'entreprise' => $request->entreprise,
            'email' => $request->email_pro,
            'telephone'=> $request->telephone_pro,
            'registre_commerce'=> $request->registre_commerce,
            'adr_facturation'=> $request->ad_facturation,
            'adr_livraison'=> $request->ad_livraison,
            'raison_sociale'=> $request->raison_sociale,
            'statut_juridique'=> $request->statut_juridique,
            'nif'=> $request->nif,
            'nis'=> $request->nis
        ]);
        }
        else {
            $client=Client::create([
                'type' =>  $request->type,
                'nom' => $request->First_Name,
                'prenom' => $request->Last_Name,
                'adresse'=> $request->adresse,
                'email' => $request->email,
                'telephone'=> $request->telephone,
            ]);
        }

        // return redirect()->route('client');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   /*
         $posts = [
            1 => 'mon titre n°1',
            2 => 'mon titre n°2'
         ];
         $post=$posts[$id] ?? 'pas de titre ';
         return view('client', [
            'post'=> $post

         ]);*/

    }
    public function contact(){
        return view('contact');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Client::find($id);
        return view('updateclient',compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateclient( $id)
    {
        $client=Client::find($id);
        return view('updateclient',compact('client'));
    }

    public function update(Request $request, $id)
    {       $client=Client::find($id);
        if( $request->type =='professional'){

            $client->type =  $request->type;
            $client->entreprise = $request->entreprise;
            $client->email = $request->email_pro;
            $client->telephone= $request->telephone_pro;
            $client->registre_commerce= $request->registre_commerce;
            $client->adr_facturation=$request->ad_facturation;
            $client->adr_livraison= $request->ad_livraison;
            $client->raison_sociale=$request->raison_sociale;
            $client->statut_juridique= $request->statut_juridique;
            $client->nif= $request->nif;
            $client-> nis= $request->nis;

       }
       else {

         $client->type =  $request->type;
         $client-> nom =$request->First_Name;
         $client-> prenom =$request->Last_Name;
         $client-> adresse= $request->adresse;
         $client->email = $request->email;
         $client->telephone= $request->telephone;

       }
       $client->save();
       // return redirect()->route('client');
       return redirect()->route('client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $client_delete= Client::find($id);
        // $client_delete
        // $client_delete->delete();
        // $client = Client::get();
        // foreach ($client as $key) {
        //     $clientfacture =Facture::where('id', $key->id)->count();
        //     if($clientfacture!=0){
        //         $client_delete->delete();
        //     }
        // }
        $client = Client::find($id);

        $clientfacture=$client->factures;

            if(count($clientfacture)==0){
                 $client->delete();
            }
        return redirect()->route('client');
    }
}
