@extends('layout.app')

@section('content')

<div class="container">

    <div class="row ">
        <div class="col-lg-15">


            <div class="row mt-5">
                <div class="col-6">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addclient" >
                        Add <i class='bx bx-plus 'id="add-client"></i></a></button>

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

            <table class="table table-bordered mb-5" id="table"   >
                <thead class="table " >
                    <tr id="table-head" >
                    <th scope="col">id</th>
                    <th scope="col">Type</th>
                    <th scope="col">Entreprise</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Contact</th>
                    <th scope="col">


                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client )
                    <tr >
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->type }}</td>
                        <td>{{ $client->entreprise }}</td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->prenom}}</td>
                        <td>{{ $client->telephone }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                </a>

                                <ul class="dropdown-menu">
                                 <li><a href="{{ url('/updateclient/'.$client->id) }}"><button type="button" class="dropdown-item" class="btn btn-primary" >Modifier</button></a></li>
                                  <li class="dropdown-item ">
                                    <form action="{{ route('client_delete',$client->id) }}" id="del{{ $client->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a ><button type="button" class="dropdown-item" onclick="supprimer('{{ $client->id }}')" class="btn btn-primary" >Supprimer</button></a>
                                        {{-- <button class="btn btn-danger delete-client" type="submit">Supprimer</button> --}}
                                    </form>
                                    </li>
                                  {{-- <li><a class="dropdown-item" href="#">Details</a></li> --}}
                                </ul>
                              </div>

                        </td>
                        </tr>

                    @endforeach

                </tbody>
                </table>
        </div>
    </div>
 <div class="d-flex justify-content-right" >
        {!!  $clients->links() !!}
</div>

</div>

@include('addclient-boostrap')

<script>
    (function(){

        $("#items-per-page").on("change", function(){
            $(this).closest('form').trigger('submit');
        })

    })(jQuery)
</script>

@endsection
