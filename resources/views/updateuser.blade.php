@extends('layout.app')

@section('content')

<div class="content user"></div>
<div class="adduser active">

    <div class="addclient-body">
        <div class="client">
            <h1 style="font-size:30px !important; font-weight:bold; margin-top:19px !important; ">Update User</h1>


        </div>



        <div class="addproduct-form">
            <form class="formulaire" action="{{route('updateusersubmit',$user->id)}}" method="POST"    >
                @csrf

                <div id='add-product' >

                <div class="produit">
                    <label for="produit">Nom</label>
                    <input  name="nom"type="text" id="nom-user" value="{{ $user->nom}}" required placeholder="Nom">
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
                    <input  name="prenom" type="text" id="prenom-user" value="{{ $user->prenom}}" placeholder="Prénom">
                </div>

                <div class="prix">
                    <label for="email"> Email</label>
                    <input  name="email" type="prix" id="email-user" value="{{$user->email}}"required placeholder="Email">
                </div>





            </div>

</div>

<!-- Modal footer -->
<div class="modal-footer footeruser">
    <div>  <button type="submit" class="btn btn-primary">Submit</button></div>
    <div><a href=""><button type="button" class="btn btn-danger" >Close</button></div></a>

</div>
</form>
        </div>
    </div>



</div>

</div>


@endsection
