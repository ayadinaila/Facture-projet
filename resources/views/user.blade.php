@extends('layout.app')

@section('content')

<div class="container mt-5">
    @if($errors->any())
    <span class="alert alert-danger" style="color: beige">{{ $errors->first() }}</span>
    @endif
    <div class="row mt-5">
        <div class="col-lg-15">
            {{-- <a href="" class="button-add-client">
                <button type="button" data-modal-target=".addclient" class="btn btn-outline-dark" id="btn-add-client">
                    Ajouter
                     <i class='bx bx-plus 'id="add-client"></i></button>
                    </a> --}}

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adduser">
                        Add
                        <i class='bx bx-plus 'id="add-client"></i></button>
                    </button>
            <table class="table table-bordered mb-5"  id="table"   >
                <thead class="table " >
                    <tr id="table-head"  >
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
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
                    @foreach ($users as $user )
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->nom}}</td>
                        <td>{{ $user->prenom}}</td>
                        <td>{{ $user->email}}</td>


                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                </a>

                                <ul class="dropdown-menu">
                                    <li>   <a href="{{ url('/updateuser/'.$user->id) }}"><button type="button" class="dropdown-item" class="btn btn-primary" >Modifier</button></a></li>
                                  <li><span class="dropdown-item delete">
                                    <form action="{{ route('userdelete',$user->id) }}" id="del{{ $user->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a ><button type="button" class="dropdown-item" onclick="supprimer('{{ $user->id }}')" class="btn btn-primary" style="margin-right:20px;">Supprimer</button></a>
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
        {!!$users->links() !!}
</div>

</div>

@include('adduser')


@endsection
