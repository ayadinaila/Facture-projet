@extends('layout.app')

@section('content')


<div class="addfacture">

    <div class="addfacture-body">
        <div class="facture">
            <h2>Add Facture</h2>


        </div>



        <div class="addfacture-form">
            <div id="addfacture-form">
            <form method="POST" action="{{ route('addfacturevalidate') }}" id="addfacture">
                @csrf

                <div class="type-facture">
                    <label for="type-facture">Type</label>

                    <select class="select-input" name="type_facture" id="type-facture" required>

                        <option    value="Proforma">Proforma</option>
                        <option  value="Facture">Facture</option>
                    </select>

            </div>


                <div class="client">
                    <label for="client">Client</label>
                    <select class="select-input" name="client_facture" id="client-facture" required>
                        <option value="1">Choose a Client</option>
                        @foreach ($clients as $client)
                        <option  id="client-facture" value="{{ $client->id }}" >
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
                             <button class="add client-button" data-bs-toggle="modal" data-bs-target="#addclient">Add</button>
                    </div>

                </div>

                <div class="produit">
                    <div id="main-produit">
                    <div id="partie_produit" class="partie-produit">

                        <label for="produit">Products</label>

                        <select class="select-input select-produit" name="produit_facture[]"  id="produit-facture" onchange="verifyproduct()" data-default-value="choose a product" required>
                            {{-- onchange="calculPrice()" --}}
                            <option value="">Choose a product</option>
                            @foreach ($produits as $produit)
                                <option  id="produit-facture" value="{{ $produit->id}}" data-price="{{ $produit->prix }}"> {{ $produit->nom}} </option>
                            @endforeach
                        </select>

                        {{-- <input type="reset" type="hidden"/> --}}
                        {{-- <input type="text" placeholder="Name" id="name"> --}}
                        <input type="Number" placeholder="Quantité" class="input-produit-quantite quantite" name='quantite_facture[]' id="quantite-facture" value="1" min="0" oninput="getTotal()" >
                        {{-- oninput="calculPrice()"  --}}

                        {{-- <div class="ajouter-produit">
                            <i class='bx bx-plus  'id="product-button"></i>
                        <button class="add product-button">Add</button>
                        </div>
                        <div class="supprimer-produit">
                            <i class="fa-solid fa-trash-can"id="product-button-delete"></i>
                        <button class="add product-button-delete">Delete</button>
                        </div> --}}
                        <input type="text" placeholder="Prix" class="input-produit-prix"  name="prix_facture[]" value=""  id="prix-facture" readonly  >

                    <div class="services">
                        <textarea name="service" id="service"></textarea>
                        <input type="text" placeholder="Prix Service" class="input-produit-service"   oninput="getTotal()" id="prix_service_facture" name='prix_service[]'  >
                        {{-- oninput="calculPrice()" --}}

                        {{-- <span class="ajouter-produit">
                             <i class='bx bx-plus  'id="product-button"></i>
                             <button class="add product-button">Add</button>
                        </span>

                        <span class="supprimer-produit"> <i class="fa-solid fa-trash-can"id="product-button-delete"></i>
                        <button class="add product-button-delete">Delete</button>
                        </span> --}}
                    <input type="text" name="remise_facture[]" class="input-produit-remise" id="remise-facture" oninput="getTotal()" placeholder="Remise" >
                    {{-- oninput="calculPrice()"  --}}
                        <input type="hidden" name="statut_facture" value="Brouillon" id="statut-facture">
                    </div>

                   </div>

                </div>
                <div class="add_delete">
                    <span class="ajouter-produit">
                       <i class='bx bx-plus 'id="product-button"></i>
                       <button class="add product-button">Add</button>
                  </span>

                  <span class="supprimer-produit"> <i class="fa-solid fa-trash-can"id="product-button-delete"></i>
                  <button type="button" class="add product-button-delete" onclick="deleteproduct()">Delete</button>
                  </span>
              </div>
                <div class="prix-facture">

                    <input type="text" name="prix_final" id="prix-final" class="prixfinal" placeholder="Prix Totale" readonly >
                    <input type="text" name="prix_tva" id="prix-tva" class="prixtva" placeholder="Prix Tva" readonly >
                    <input type="text" name="prix_ttc" id="prix-ttc" class="prixttc" placeholder="Prix Ttc" readonly>
                </div>

                </div>

                {{-- <div class="submit-cancel">
                    <input type="submit" class="submit-button" value="submit">
                    <button class="cancel-button">Cancel</button>
                </div> --}}

                <div class="submit-cancel">
                    <button class="submit-button" type="button" id="enregistrer" onclick="changestatutadd()">Enregistrer confirmation</button>
                    <button class="submit-button" type="submit" style="background-color: #5a786f">Enregistrer brouillon</button>
                    {{-- <form action="{{ route('cancel') }}"><button class="cancel-button">Cancel</button>
                    </form> --}}
                   <a href="{{ url('cancel') }}"><button class="cancel-button">Cancel</button></a>
                </div>

            </form>
        </div>
        </div>
    </div>











</div>

@include('addclient-boostrap')



@endsection
