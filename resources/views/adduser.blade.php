<!-- Button to Open the Modal -->

{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
  </button> --}}

  <!-- The Modal -->
  <div class="modal active" id="adduser">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Add User</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

                        <form class="formulaire" action="{{route('adduser')}}" method="POST"   >
                            @csrf

                            <div id='add-product' >

                            <div class="produit">
                                <label for="produit">Nom</label>
                                <input  name="nom"type="text" id="nom-user" required placeholder="Nom">
                                {{-- @if ($errors->has('entreprise'))
                                 <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('entreprise') }}</strong>
                              </span>
                               @endif --}}

                               {{-- @if ($errors->any())


                               <div class="alert alert-danger" role="alert">
                                This is a danger alert—check it out!
                              </div>

                              @endif --}}
                            </div>
                            <div class="code_produit">
                                <label for="prenom">Prénom</label>
                                <input  name="prenom" type="text" id="prenom-user"  placeholder="Prénom">
                            </div>

                            <div class="prix">
                                <label for="email"> Email</label>
                                <input  name="email" type="prix" id="email-user" required placeholder="Email">
                            </div>


                            <div class="unite">
                                <label for="password">Password</label>
                                <input name="password" type="password" id="upassword-user" required placeholder="Password">
                            </div>



                        </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            {{-- <button type="button" class="btn btn-success">Success</button> --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
    </form>
        <div id="overlay"></div>

      </div>
    </div>
  </div>
