@extends('layout.app')

@section('content')

<div class="container ">
    @if($errors->any())
    <span class="alert alert-danger" style="color: beige">{{ $errors->first() }}</span>
    @endif
    <div class="row ">
        <div class="col-lg-15">
            <div class="row mt-5">
                <div class="col-6">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct">
                        Add
                        <i class='bx bx-plus 'id="add-client"></i></button>
                </div>
                <div class="mt-5 col-6 d-flex justify-content-end ">
                    <form action="{{ url()->current() }}" method="get" >
                        <select name="perPage" id="items-per-page">
                            <option value="10" {{ request()->input('perPage') == '10' ? 'selected' : '' }}>10</option>
                            <option value="15" {{ request()->input('perPage') == '15' ? 'selected' : '' }}>15</option>
                            <option value="20" {{ request()->input('perPage') == '20' ? 'selected' : '' }}>20</option>
                        </select>
                    </form>
                </div>



            </div>

            {{-- <a href="" class="button-add-client">
                <button type="button" data-modal-target=".addclient" class="btn btn-outline-dark" id="btn-add-client">
                    Ajouter
                     <i class='bx bx-plus 'id="add-client"></i></button>
                    </a> --}}


            <table class="table table-bordered mb-5"  id="table"   >
                <thead class="table " >
                    <tr id="table-head"  >
                    <th scope="col">id</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Code Produit</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Unite</th>
                    <th scope="col">Description</th>
                    <th scope="col">

                       {{-- <a href="" class="button-add-client">

                        <button type="button" data-modal-target=".addclient" class="btn btn-outline-dark" id="btn-add-client">
                            Ajouter
                             <i class='bx bx-plus 'id="add-client"></i></button>
                      </a> --}}
                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit )
                    <tr>
                        <th scope="row">{{ $produit->id }}</th>
                        <td>{{ $produit->nom}}</td>
                        <td>{{ $produit->code_produit}}</td>
                        <td>{{ $produit->prix }}</td>
                        <td>{{ $produit->unite }}</td>
                        <td>{{ $produit->description}}</td>

                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                </a>

                                <ul class="dropdown-menu">
                                  <li>   <a href="{{ url('/updateproduit/'.$produit->id) }}"><button type="button" class="dropdown-item" class="btn btn-primary" >Modifier</button></a></li>
                                  <li><span class="dropdown-item delete">
                                    <form action="{{ route('product_delete',$produit->id) }}" id="del{{ $produit->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a ><button type="button" onclick="supprimer('{{ $produit->id }}')" class="dropdown-item" class="btn btn-primary" style="margin-right:20px;">Supprimer</button></a>
                                    </form>
                                    </span></li>

                                </ul>
                              </div>

                        </td>
                        </tr>

                    @endforeach
{{--
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Actions
                            </a>

                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Modifier</a></li>
                              <li><a class="dropdown-item" href="#">Supprimer</a></li>
                              <li><a class="dropdown-item" href="#">Details</a></li>
                            </ul>
                          </div>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Actions
                            </a>

                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Modifier</a></li>
                              <li><a class="dropdown-item" href="#">Supprimer</a></li>
                              <li><a class="dropdown-item" href="#">Details</a></li>
                            </ul>
                          </div>
                    </td>
                    </tr> --}}
                </tbody>
                </table>
        </div>
    </div>
    <div class="d-flex justify-content-right" >
        {!! $produits->links() !!}
</div>
</div>

@include('addproducts')

<script>
    (function(){

        $("#items-per-page").on("change", function(){
            $(this).closest('form').trigger('submit');
        })

    })(jQuery)
</script>

@endsection
