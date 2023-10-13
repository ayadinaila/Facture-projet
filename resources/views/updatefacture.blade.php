@extends('layout.app')

@section('content')


<div class="addfacture">

    <div class="addfacture-body">
        <div class="facture">
            <h2>Update Facture</h2>


        </div>



        <div class="addfacture-form">
            <form method="POST" action="{{ route('updatefacturesubmit',$facture->id) }}" id="updatefacture">
                @csrf

                <div class="type-facture">
                    <label for="type-facture">Type</label>

                    <select class="select-input" name="type_facture" id="type-facture" required>

                        <option {{ $facture->type_facture=='Proforma' ? "selected" : "" }}  value="Proforma">Proforma</option>
                        <option {{ $facture->type_facture=='Facture' ? "selected" : "" }} value="Facture">Facture</option>
                    </select>

            </div>


                <div class="client">
                    <label for="client">Client</label>
                    <select class="select-input" name="client_facture" id="client-facture" required>
                        <option value="1">Choose a Client</option>
                        @foreach ($clients as $client)
                        <option {{ $facture->client->id==$client->id ? "selected" : "" }} id="client-facture" value="{{ $client->id }}" >
                            @if ($client->type=="professional")
                                {{  $client->entreprise}}

                            @else
                            {{  $client->nom}}
                            @endif
                        </option>
                    @endforeach
                    </select>
                    <div class="ajouter-client">
                                <i class='bx bx-plus  'id="client-button"></i>
                             <button type="button" class="add client-button" data-bs-toggle="modal" data-bs-target="#addclient">Add</button>
                    </div>

                </div>

                <div class="produit">
                    <div id="main-produit">
                    <div id="partie_produit" class="partie-produit">


                    @for ($i=0;$i<$facture->facture_produit->count();$i++)
                    <label for="produit">Products</label>
                    <select class="select-input select-produit" name="produit_facture[]" id="produit-facture" onchange="getTotal()" required>
                        <option value="">Choose a product</option>
                        @foreach ($produits as $produit)
                            <option {{ $facture->facture_produit[$i]->produit->id==$produit->id ? "selected" : "" }} id="produit-facture" value="{{ $produit->id}}" data-price="{{ $produit->prix }}"> {{ $produit->nom}} </option>
                        @endforeach
                    </select>
                    {{-- <input type="text" placeholder="Name" id="name"> --}}
                    <input type="Number" placeholder="Quantité" name='quantite_facture[]' class='input-produit-quantite quantite' value="{{ $facture->facture_produit[$i]->quantite}}"  min="0"  id="quantite-facture" oninput="getTotal()" >
                    {{-- <div class="ajouter-produit">
                        <i class='bx bx-plus  'id="product-button"></i>
                     <button class="add product-button">Add</button>
                     </div>
                     <div class="supprimer-produit">
                        <i class="fa-solid fa-trash-can"id="product-button-delete"></i>
                     <button class="add product-button-delete">Delete</button>
                    </div> --}}
                    <input type="text" placeholder="Prix" name="prix_facture[]" class="input-produit-prix" value="{{ $facture->facture_produit[$i]->produit->prix }}" id="prix-facture" readonly  >

                    <div class="services">
                        <textarea name="service" id="service"></textarea>
                        <input type="text" placeholder="Prix Service" class="input-produit-service" value="{{ $facture->facture_produit[$i]->produit->service }}" oninput="getTotal()"  id="prix_service_facture" name='prix_service[]'  >
                        {{-- <span class="ajouter-produit">
                             <i class='bx bx-plus  'id="product-button"></i>
                             <button class="add product-button">Add</button>
                        </span>

                        <span class="supprimer-produit"> <i class="fa-solid fa-trash-can"id="product-button-delete"></i>
                        <button class="add product-button-delete">Delete</button>
                        </span> --}}
                    <input type="text" name="remise_facture[]" class="input-produit-remise"  value="{{ $facture->facture_produit[0]->produit->remise }}" id="remise-facture" oninput="getTotal()"  placeholder="Remise" >
                        <input type="hidden" name="statut_facture" value="Brouillon" id="statut-facture">
                    </div>
                    <br>
                    @endfor
                    </div>
                   </div>
                    <div class="add_delete">
                          <span class="ajouter-produit">
                             <i class='bx bx-plus  'id="product-button"></i>
                             <button type="button" class="add product-button">Add</button>
                        </span>

                        <span class="supprimer-produit"> <i class="fa-solid fa-trash-can"id="product-button-delete"></i>
                        <button type="button" class="add product-button-delete" onclick="deleteproduct()">Delete</button>
                        </span>
                    </div>
                <div class="prix-facture">

                    <input type="text" name="prix_final" value="{{ $facture->totale_ht }}" class="prixfinal" id="prix-final" placeholder="Prix Totale" readonly >
                    <input type="text" name="prix_tva" value="{{ $facture->totale_tva }}" class="prixtva" id="prix-tva" placeholder="Prix Tva" readonly >
                    <input type="text" name="prix_ttc" value="{{ $facture->totale_ttc }}" class="prixttc" id="prix-ttc" placeholder="Prix Ttc" readonly>
                </div>

                </div>

                {{-- <div class="submit-cancel">
                    <input type="submit" class="submit-button" value="submit">
                    <button class="cancel-button">Cancel</button>
                </div> --}}

                <div class="submit-cancel">
                    <button class="submit-button" type="button" id="enregistrer" onclick="changestatut()">Enregistrer confirmation</button>
                    <button class="submit-button" type="submit">Enregistrer brouillon</button>
                    <button class="cancel-button">Cancel</button>
                </div>

            </form>
        </div>
    </div>











</div>

@include('addclient-boostrap')



@endsection
