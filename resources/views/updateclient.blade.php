@extends('layout.app')



@section('content')
<div class="content">
<div class="addclient active">

    <div class="addclient-body">
        <div class="client">
            <h1 style="font-size:30px !important; font-weight:bold; margin-top:19px !important; ">Update Client</h1>


        </div>



        <div class="addclient-form">

            <form class="formulaire" id='updateclient' action="{{route('updateclientsubmit',$client->id)}}" method="POST"   >
                @csrf
                <div class="type">
                        <label for="type">Type</label>

                        <input type="radio" id="professional" name="type"  value="professional" onclick="Showhide(0)" style="margin-left:20px;" >
                        <label for="professional" id="type1">Professional</label>
                        <input type="radio" id="particular"  name="type"   value="particular" onclick="Showhide(1)" style="margin-left:50px;">
                        <label for="particular" id="type2" >Particular</label>

                </div>

                <div id='add-client-professional' style="display: none;">

                <div class="entreprise">
                    <label for="entreprise">Entreprise</label>
                    <input class="input-professionals" name="entreprise" type="text" value={{ $client->entreprise }} id="entreprise" required placeholder="Entreprise">
                    {{-- @if ($errors->has('entreprise'))
                     <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('entreprise') }}</strong>
                  </span>
                   @endif --}}
                   @if ($errors->any())


                   <div class="alert alert-danger" role="alert">
                    This is a danger alert—check it out!
                  </div>

                  @endif
                </div>
                <div class="email">
                    <label for="email">E-mail</label>
                    <input class="input-professionals" value={{ $client->email }} name="email_pro" type="email" id="email" required placeholder="E-mail">
                </div>


                <div class="telephone">
                    <label for="telephone">Phone</label>
                    <input  class="input-professionals" value={{ $client->telephone}} name="telephone_pro"type="text" id="telephone" data-role="input, input-mask" data-mask="+213 (__) ___-____" required placeholder="phone">
                </div>

                <div class="registre-commerce">
                    <label for="registre-commerce">Registre-commerce</label>
                    <input class="input-professionals" value={{ $client->registre_commerce }} name="registre_commerce"type="text" id="registre-commerce" required placeholder="Registre-commerce">
                </div>

                <div class="statut-juridique">
                    <label for="statut">Statut-juridique</label>
                    <select class="select-input statut" name="statut_juridique" value="{{ $client->statut_juridique }}" id="client" style=" margin-left: 53px;">
                        <option value="0">Statut juridique</option>
                        <option {{ $client->statut_juridique=='Sarl' ? "selected" : "" }} value="Sarl">Sarl</option>
                        <option {{ $client->statut_juridique=='Eurl' ? "selected" : "" }}  value="Eurl">Eurl</option>
                        <option {{ $client->statut_juridique=='Spa' ? "selected" : "" }}  value="Spa">Spa</option>
                        <option {{ $client->statut_juridique=='Sa' ? "selected" : "" }}  value="Sa">Sa</option>
                        <option {{ $client->statut_juridique=='Sncw' ? "selected" : "" }}  value="Snc">Snc</option>

                    </select>

                </div>

                <div class="raison-sociale">
                    <label for="raison-sociale">Raison-sociale</label>
                    <input type="text" name="raison_sociale" value="{{ $client->raison_sociale }}" id="raison_sociale"  placeholder="Raison-sociale" >
                </div>
                <div class="nif">
                    <label for="nif">Nif</label>
                    <input type="text" name="nif" id="nif" value="{{ $client->nif }}" placeholder="identification fiscale" >
                </div>
                <div class="nis">
                    <label for="nis">nis</label>
                    <input type="text" name="nis" id="nis" value="{{ $client->nis}}" placeholder="identification statistique" >
                </div>

                <div class="ad-facturation">
                    <label for="ad-facturation">Ad-Facturation</label>
                    <input class="input-professionals" name="ad_facturation"type="text" value="{{ $client->adr_facturation }}" id="ad-facturation" required placeholder="Adresse-Facturation">
                </div>

                <div class="ad-livraison">
                    <label for="ad-livraison">Ad-Livraison</label>
                    <input class="input-professionals" name="ad_livraison" type="text"  value="{{ $client->adr_livraison}}" id="ad-livraison" required placeholder="Adresse-Livraison">
                </div>

                {{-- <div class="submit-cancel-client" >
                    <button class="submit-button">Submit</button>
                    <button class="cancel-button">Cancel</button>
                </div> --}}
                <div class="modal-footer footer-client">
                    <div>  <button type="button" onclick="modifier('updateclient')" class="btn btn-primary">Submit</button></div>
                    <div><a href=""><button type="button" class="btn btn-danger" >Close</button></div></a>

                </div>
            </div>


            <!-- add client particular-->


            <div id='add-client-particular' style="display: none;" >
                <div class="First-Name">
                    <label for="nom">First-Name</label>
                    <input class="input-particulars"  name="First_Name"type="text" value="{{ $client->nom}}" id="nom" required placeholder="First-Name" >
                </div>

                <div class="Last-Name">
                    <label for="prenom">Last-Name</label>
                    <input class="input-particulars" name="Last_Name"type="text" value="{{ $client->prenom}}" id="prenom" required placeholder="Last-Name">
                </div>

                <div class="email">
                    <label for="email">E-mail</label>
                    <input class="input-particulars" name="email"type="email" value="{{ $client->email }} "id="email" required placeholder="E-mail">
                </div>


                <div class="telephone">
                    <label for="telephone">Phone</label>
                    <input class="input-particulars" name="telephone"type="tel" value="{{ $client->telephone}} "  id="telephone" required placeholder="phone">
                </div>

                <div class="adresse">
                    <label for="adresse">Adresse</label>
                    <input type="text" id="adresse" name="adresse" value="{{ $client->adresse }} "placeholder="Adresse">
                </div>

                {{-- <div class="submit-cancel-client">
                    <button class="submit-button">Submit</button>
                    <button class="cancel-button">Cancel</button>
                </div> --}}

                <div class="modal-footer footer-client">
                    <div>  <button type="submit" class="btn btn-primary">Submit</button></div>
                    <div><a href=""><button type="button" class="btn btn-danger" >Close</button></div></a>

                </div>
            </div>




            </form>


    </div>

    </div>


</div>
</div>
{{-- <div id="overlay"></div> --}}









@endsection
