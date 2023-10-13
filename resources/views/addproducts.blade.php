<!-- Button to Open the Modal -->

{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
  </button> --}}

  <!-- The Modal -->
  <div class="modal active" id="addproduct">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h2 class="modal-title">Add Product</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">

                        <form class="formulaire" action="{{route('addproduct')}}" method="POST"   >
                            @csrf

                            <div id='add-product' >

                            <div class="produit">
                                <label for="produit">Produit</label>
                                <input  name="produit"type="text" id="produit" required placeholder="Produit">
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
                            <div class="code_produit">
                                <label for="code_produit">Code produit</label>
                                <input  name="code_produit" type="text" id="code_produit"  placeholder="code produit">
                            </div>

                            <div class="prix">
                                <label for="prix">Prix</label>
                                <input  name="prix" type="prix" id="prix" required placeholder="prix">
                            </div>


                            <div class="unite">
                                <label for="unite">Unité</label>
                                <input name="unite" type="number" id="unite" required placeholder="unite">
                            </div>

                            <div class="description">
                                <label for="description">Description</label>
                                {{-- <input  name="description"type="textarea" id="description"  placeholder="Description du produit"> --}}
                                <textarea name="description" id="description" ></textarea>
                            </div>

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
