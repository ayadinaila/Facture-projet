
@extends('layout.app')



@section('content')
<div class="content">
<div class="addclient active">

    <div class="addclient-body">
        <div class="client">
            <h1 style="font-size:30px !important; font-weight:bold; margin-top:19px !important; ">Update Product</h1>


        </div>

  <div class="addproduct-form">

    <form class="formulaire" id="updateproduct" action="{{route('updateproduitsubmit',$produit->id)}}" method="POST"   >
        @csrf

        <div id='add-product' >

        <div class="produit">
            <label for="produit">Produit</label>
            <input  name="produit"type="text" value="{{ $produit->nom }}"id="produit" required placeholder="Produit">
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
            <input  name="code_produit" type="text" value="{{$produit->code_produit}}" id="code_produit"  placeholder="code produit">
        </div>

        <div class="prix">
            <label for="prix">Prix</label>
            <input  name="prix" type="prix" value="{{ $produit->prix }}" id="prix" required placeholder="prix">
        </div>


        <div class="unite">
            <label for="unite">Unité</label>
            <input name="unite" type="number" value="{{ $produit->unite }}" id="unite" required placeholder="unite">
        </div>

        <div class="description">
            <label for="description">Description</label>
            {{-- <input  name="description"type="textarea" id="description"  placeholder="Description du produit"> --}}
            <textarea name="description"  id="description" >{{ $produit->description }}</textarea>
        </div>

    </div>

    <div class="modal-footer footer-produit">
        <div>  <button type="button" onclick="modifier('updateproduct')" class="btn btn-primary">Submit</button></div>
        <div><a href=""><button type="button" class="btn btn-danger" >Close</button></div></a>

    </div>
</form>
</div>

</div>
</div>
</div>
@endsection
