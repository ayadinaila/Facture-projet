@extends('layout.app')
@section('content')

<style>
    * {
    margin: 0;
    padding: 0
}

body {
    background-color: #000
}

.card {
    margin-top:80px;
    margin-right:500px;
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}
.card-content{
    margin-top:-420px;
    margin-left:800px;
    width: 470px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}
.image img {
    transition: all 0.5s;
    background-color:#aeaeae;
    color: #aeaeae;
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</style>

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
         <div class=" image d-flex flex-column justify-content-center align-items-center style="background-color:#fff;">
            <button class="btn btn-secondary"style="background-color:#fff;border-color:#fff;">
                <img src="{{ asset('assets/images/profile_pic.png') }}"style="height:100px; width:100px; background-color:#fff;"  /></button>
                 <span class="name mt-3">{{ $user->nom}} {{ $user->prenom }}</span> <span class="idd">{{ $user->email }}</span>
                 <div class="d-flex flex-row justify-content-center align-items-center gap-2">

                     </div>

                     <div class=" d-flex mt-2">
                         <button class="btn1 btn-dark" id="editbutton" onclick="editprofile()"><a>Edit Profile</a></button>
                        </div>
                        <div class="text mt-3">
                            {{-- <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.<br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> --}}
                        </div>
                        <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">
                            {{-- <span><i class="fa fa-twitter"></i></span>
                            <span><i class="fa fa-facebook-f"></i></span>
                            <span><i class="fa fa-instagram"></i></span>
                            <span><i class="fa fa-linkedin"></i></span> --}}
                        </div>
                        <div class=" px-2 rounded mt-4 date ">
                            <span class="join">Joined May,2021</span>
                        </div>
                     </div>
                    </div>
</div>

<div class="card card-content" style="display:none;" id="card-content">
    <div class="card-header">
      Edit Your Profile
    </div>
    <div class="card-body">

        <form class="formulaire" action="{{route('updateuser',$user->id)}}" method="POST"   >
            @csrf

            <div id='add-product' >

            <div class="produit">
                <label for="produit">Nom</label>
                <input  name="nom"type="text" id="nom-user" value="{{ $user->nom}}"  required placeholder="Nom">
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
                <input  name="prenom" type="text" id="prenom-user" value="{{ $user->prenom}}"  placeholder="Prénom">
            </div>

            <div class="prix">
                <label for="email"> Email</label>
                <input  name="email" type="prix" id="email-user" value="{{ $user->email}}" required placeholder="Email">
            </div>


            <div class="unite">
                <label for="password">Password</label>
                <input name="password" type="password" id="upassword-user"  placeholder="Password">
            </div>



        </div>

</div>

<!-- Modal footer -->
<div class="modal-footer">
{{-- <button type="button" class="btn btn-success">Success</button> --}}
<button type="submit" class="btn btn-secondary" style="width:100px; height:45px; border-radius:12px; background-color: #3a4e51; border-color:#3a4e51;">Submit</button>

</div>
</form>

    </div>
  </div>



@endsection
