<!-- Button to Open the Modal -->

{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
  </button> --}}

  <!-- The Modal -->
  <div class="modal active" id="addclient">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Add Client</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

                        <form class="formulaire" action="{{route('addclientvalidate')}}" method="POST"   >
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
                                <input class="input-professionals" name="entreprise"type="text" id="entreprise" required placeholder="Entreprise">
                                {{-- @if ($errors->has('entreprise'))
                                 <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('entreprise') }}</strong>
                              </span>
                               @endif --}}
                                 </div>
                            <div class="email">
                                <label for="email">E-mail</label>
                                <input class="input-professionals" name="email_pro" type="email" id="email" required placeholder="E-mail">
                                {{-- @if ($errors->has('email_pro'))
                                <br>
                                          <div class="invalid-feedback" >
                                        {{ $errors->first('email_pro') }}
                                       </div>
                                 @endif --}}
                            </div>


                            <div class="telephone">
                                <label for="telephone">Phone</label>
                                <input  class="input-professionals" name="telephone_pro"type="text" id="telephone" data-role="input, input-mask" data-mask="+213 (__) ___-____" required placeholder="phone">
                            </div>

                            <div class="registre-commerce">
                                <label for="registre-commerce">Registre-commerce</label>
                                <input class="input-professionals" name="registre_commerce"type="text" id="registre-commerce" required placeholder="Registre-commerce">
                            </div>
                            @error('record')

                            @enderror
                            {{-- <span class =" text-danger "> @error( 'registre-commerce' ) {{$message}} @enderror </span> --}}

                            <div class="statut-juridique">
                                <label for="statut">Statut-juridique</label>
                                <select class="select-input statut" name="statut_juridique" id="client" style=" margin-left: 53px;">
                                    <option value="0">Statut juridique</option>
                                    <option value="Sarl">Sarl</option>
                                    <option value="Eurl">Eurl</option>
                                    <option value="Spa">Spa</option>
                                    <option value="Sa">Sa</option>
                                    <option value="Snc">Snc</option>

                                </select>

                            </div>

                            <div class="raison-sociale">
                                <label for="raison-sociale">Raison-sociale</label>
                                <input type="text" name="raison_sociale"id="raison_sociale"  placeholder="Raison-sociale" >
                            </div>
                            <div class="nif">
                                <label for="nif">Nif</label>
                                <input type="text" name="nif" id="nif"  placeholder="identification fiscale" >
                            </div>
                            <div class="nis">
                                <label for="nis">nis</label>
                                <input type="text" name="nis" id="nis"  placeholder="identification statistique" >
                            </div>

                            <div class="ad-facturation">
                                <label for="ad-facturation">Ad-Facturation</label>
                                <input class="input-professionals" name="ad_facturation"type="text" id="ad-facturation" required placeholder="Adresse-Facturation">
                            </div>

                            <div class="ad-livraison">
                                <label for="ad-livraison">Ad-Livraison</label>
                                <input class="input-professionals" name="ad_livraison" type="text" id="ad-livraison" required placeholder="Adresse-Livraison">
                            </div>

                            {{-- <div class="submit-cancel-client" >
                                <button class="submit-button">Submit</button>
                                <button class="cancel-button">Cancel</button>
                            </div> --}}
                        </div>


                        <!-- add client particular-->


                        <div id='add-client-particular' style="display: none;" >
                            <div class="First-Name">
                                <label for="nom">First-Name</label>
                                <input class="input-particulars"  name="First_Name"type="text" id="nom" required placeholder="First-Name" >
                            </div>

                            <div class="Last-Name">
                                <label for="prenom">Last-Name</label>
                                <input class="input-particulars" name="Last_Name"type="text" id="prenom" required placeholder="Last-Name">
                            </div>

                            <div class="email">
                                <label for="email">E-mail</label>
                                <input class="input-particulars" name="email"type="email" id="email" required placeholder="E-mail">
                            </div>


                            <div class="telephone">
                                <label for="telephone">Phone</label>
                                <input class="input-particulars" name="telephone"type="tel" id="telephone" required placeholder="phone">
                            </div>

                            <div class="adresse">
                                <label for="adresse">Adresse</label>
                                <input type="text" id="adresse" name="adresse"  placeholder="Adresse">
                            </div>

                            {{-- <div class="submit-cancel-client">
                                <button class="submit-button">Submit</button>
                                <button class="cancel-button">Cancel</button>
                            </div> --}}
                        </div>







        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-success">Success</button> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div></form>
        <div id="overlay"></div>

      </div>
    </div>
  </div>
