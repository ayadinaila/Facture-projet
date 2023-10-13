@extends('layout.app')

@section('content')

<div class="container ">
    {{-- @if($errors->any())
    <span class="alert alert-danger" style="color: beige">{{ $errors->first() }}</span>
    @endif --}}
    <div class="row ">
        <div class="col-lg-15">

            <div class="row mt-5">
                <div class="col-6">

                    <button type="button" class="btn btn-primary" >
                        <a href="/addfacture"> Add <i class='bx bx-plus 'id="add-client"></i></a></button>

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

                    {{-- <button type="button" class="btn btn-primary" >
                        <a href="/addfacture"> Add <i class='bx bx-plus 'id="add-client"></i></a></button> --}}

            <table class="table table-bordered mb-5" id="table"  >
                <thead class="table " >
                    <tr id="table-head"  >
                    <th scope="col">id</th>
                    <th scope="col">Code_Facture</th>
                    <th scope="col">Type</th>

                    <th scope="col">Client</th>
                    <th scope="col">statut</th>
                    <th scope="col">Date</th>
                    <th scope="col">Created_By</th>
                    <th scope="col">


                    </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($factures as $facture )
                    <tr>
                        <th scope="row">{{ $facture ->id }}</th>
                         <td>{{ $facture ->code_facture}}</td>
                         <td>{{ $facture ->type_facture }}</td>


                        <td> @if($facture->client->type=="professional")
                            {{ $facture->client->entreprise }}

                        @else
                            {{ $facture->client->nom}}

                        @endif
                    </td>

                        <td>
                            @if ($facture->statut=="Enregistrer")
                            <span class="text-info">{{ $facture->statut}}</span>
                            @else
                                @if ($facture->statut=="Brouillon")
                                 <span class="text-secondary">{{ $facture->statut}}</span>
                                @else
                                @if ($facture->statut=="Approuvé")
                                <span class="text-success">{{ $facture->statut}}</span>
                                @else
                                <span class="text-danger">{{ $facture->statut}}</span>
                                @endif
                            @endif
                            @endif

                        </td>
                        <td>{{ $facture->created_at->format('d/m/Y') }}</td>
                        {{-- <td>{{ $facture->user ? $facture->user->nom : "N/A"}}</td> --}}
                        <td>{{ $user  }}</td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Actions
                                </a>

                                <ul class="dropdown-menu">

                                @if ((($facture->statut) != "Approuvé")&&(($facture->statut ) != "Rejeté"))
                                <li>   <a href="{{ url('/updatefacture/'.$facture->id) }}"><button type="button"  class="dropdown-item" class="btn btn-primary" >Modifier</button></a></li>

                                               <li><span class="dropdown-item delete">
                                                <form action="{{ route('facture_delete',$facture->id) }}" id="del{{ $facture->id }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a ><button type="button" class="dropdown-item" onclick="supprimer('{{ $facture->id }}')" class="btn btn-primary" style="margin-right:20px;">Supprimer</button></a>
                                                </form>
                                             </span></li>



                                @endif
                        <li><a class="dropdown-item" href="{{ url('/affichage/'.$facture->id) }}">Details</a></li>



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
        {!! $factures->links() !!}
</div>

</div>

<script>
    (function(){

        $("#items-per-page").on("change", function(){
            $(this).closest('form').trigger('submit');
        })

    })(jQuery)
</script>

@endsection
