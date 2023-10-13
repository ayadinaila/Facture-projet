@extends('layout.app')
@section('content')


<body>
    <div class="container-facture">
        <div class="button-approuve" style="margin-bottom: 10px">
            {{-- <form action="/nonapprouve" method="POST">
                @csrf
                <button type="submit"  style="background-color:crimson; border-color:crimson; " class="btn btn-secondary">Non-Approuvé</button>
            </form>

            <form action="/approuve" method="post">
                @csrf
                <button type="button" class="btn btn-secondary " style="background-color:green; border-color:green; ">Approuvé</button>
            </form> --}}
             @if ($facture->statut =="Approuvé" )
             <button  type="button" onclick="imprimer('document')" id="imprimer" id="sweetalert" style="background-color:rgb(53, 53, 255); border-color:rgb(143, 143, 241); "  class="btn btn-secondary imprimer">Imprimer</button>
             @else
             <button type="button" id="rejeté" onclick="rejete('{{ route('nonapprouve',$facture->id) }}')" id="sweetalert" style="background-color:crimson; border-color:crimson; " class="btn btn-secondary rejeté">Rejeté</button>

              <button type="button" id="approuve" onclick="approuve('{{ route('approuve',$facture->id) }}')" class="btn btn-secondary approuve" style="background-color:green; border-color:green; ">Approuvé</button>
             @endif


        </div>

    <div class="document" id="document" style="  width: 21cm;height: 29cm;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
        <div class="header" style=" margin:10px 15px 10px 15px; display: flex; justify-content: space-between;
        align-items: center;border-bottom: 3px solid green;">
            <div class="title" style=" padding: 10px;border-radius: 2px;">
                <h1 style=" font-weight:bold ;font-size: 24px;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">{{ $facture->type_facture }} N° <span style="font-size: 18px;">{{ $facture->code_facture }}</span></h1>
            </div>
            <div class="logo">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 200px;">
            </div>
        </div>
        <div class="body">
            <div class="entreprise" style="font-size: 12px;margin: 20px;display: flex; justify-content: space-between; justify-items: center;">
                <div class="info-entreprise">
                    <table>
                        <tr>
                            <td> <strong>AZIMUT Business Solutions</strong> </td>
                        </tr>
                        <tr>
                            <td>Villa 189, Coop Bois des cars 03</td>
                        </tr>
                         <tr>
                            <td>16302 Dely Brahim - Alger - Algérie</td>
                        </tr>
                        <tr>
                            <td>Téléphone: +213 23 29 81 19</td>
                        </tr>
                        <tr>
                            <td>RC : 16/00-0727207 B 15</td>
                        </tr>
                        <tr>
                            <td>A.I : 16115207262</td>
                        </tr>
                        <tr>
                            <td>NIF : 001535072720745</td>
                        </tr>
                        <tr>
                            <td>NIS : 001535380019350</td>
                        </tr>
                    </table>
                </div>
                <div class="biling-address" style="text-align: center;">
                    <table>
                        <tr>
                            <td> Adresse de Facturation :</td>
                        </tr>

                        <tr>
                            <td> {{  $facture->client->adr_facturation}} </td>
                        </tr>

                    </table>
                </div>

            </div>
​
            <div class="client" style="font-size: 12px;margin: 20px;display: flex; justify-content: space-between; justify-items: center;">
                <div class="client-information" style="background-color: #e9e9e9;">
                    <table>
                        <tr>
                            <td> Date : {{ $facture->created_at->format('d/m/Y') }} </td>
                        </tr>
                        @if ($facture->client->type =="professional" )
                        <tr>
                            <td>Entreprise : {{ $facture->client->entreprise}} </td>
                        </tr>
                        <tr>
                            <td>Téléphone : {{  $facture->client->telephone}}</td>
                        </tr>
                        <tr>
                            <td>Email : {{  $facture->client->email}}</td>
                        </tr>
                        <tr>
                            <td>RC : {{  $facture->client->registre_commerce}}</td>
                        </tr>
                        <tr>
                            <td>A.I : 16115207262</td>
                        </tr>
                        <tr>
                            <td>NIF :  {{  $facture->client->nif}}</td>
                        </tr>
                        <tr>
                            <td>NIS :  {{  $facture->client->nis}}</td>
                        </tr>
                        @else
                        <tr>
                            <td>Client : {{ $facture->client->nom}} {{ $facture->client->prenom}} </td>
                        </tr>
                        <tr>
                            <td>Téléphone : {{  $facture->client->telephone}}</td>
                        </tr>
                        <tr>
                            <td>Email : {{  $facture->client->email}}</td>
                        </tr>
                        @endif


                    </table>
                </div>
​
                <div class="biling-date" style="text-align: center;">
                    <table>
                        <tr>
                            <td> Adresse de Livraison : </td>
                        </tr>

                        <tr>
                            <td> {{  $facture->client->adr_livraison}} </td>
                        </tr>

                    </table>
                </div>

            </div>
​
            <div class="contentfacture">
                <table style="width: 100%; font-size: 12px;text-align: center;
                border-top: 2px solid green; border-bottom: 2px solid rgb(221, 221, 221);font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                    <thead>
                        <tr style="border-bottom: 2px solid rgb(221, 221, 221);">
                            <th class="desc">Description</th>
                            <th class="qty">Quantité</th>
                            <th>Unité</th>
                            <th class="qty">Prix Unitaire</th>
                            <th class="unitTh">Prix HT</th>
                        </tr>
                    </thead>
                    @for ($i =0; $i < $facture->facture_produit->count(); $i++)

​                        <tr style="border-bottom: 2px solid rgb(221, 221, 221);height:70px;">
                            <th class="desc">{{ $facture->facture_produit[$i]->produit->nom }}</th>
                            <th class="qty">{{ $facture->facture_produit[$i]->quantite }}</th>
                            <th>{{ $facture->facture_produit[$i]->produit->unite }}</th>
                            <th class="qty">{{ $facture->facture_produit[$i]->produit->prix }}Da</th>
                            <th class="unitTh">{{ $facture->facture_produit[$i]->montant}}Da</th>
                        </tr>

                        @endfor
                    <tbody>

                    </tbody>
                </table>
            </div>
            <br>
            <div class="footer-content" style="margin-right: 20px;">
                <table style="width: 100%;"  >
                    <tr style=" font-size: 14px; ">
                        <th class="desc" style="margin-left:20px;">Total HT</th>
                        <td class="unit">{{ number_format($facture->totale_ht,2,","," ")}} DA</td>

                    </tr>
                    <tr>
                        <th>Total Tva</th>
                        <td style="font-size: 14px;">{{ number_format($facture->totale_tva,2,","," ")}} DA</td>
                    </tr>
                    <tr style=" font-size: 14px;
                   ">
                        <th class="desc">Remise</th>
                        <td class="unit">{{ $facture->facture_produit->sum('remise') }}</td>

                    </tr>
                    <tr style=" font-size: 14px;
                    ">

                         <th class="desc">Service</th>
                         <td class="unit">{{ $facture->facture_produit->sum('service') }}</td>
                     </tr>
                    <tr style=" font-size: 14px;
                   ">
                        <th class="desc">Total Ttc</th>
                        <td class="unit"> {{ number_format($facture->totale_ttc,2,","," ")}} DA </td>

                    </tr>
                </table>
            </div>
            <br>
            <div class="note">
                <table style=" font-size: 14px;
                margin: 20px;
                width: 100%;">
                    <tr style="text-align: left;">
                        <th>Note:</th>
                    </tr>
                </table>
            </div>
            <br>
            <div class="signature">
                <h5 style=" position: relative;
                text-decoration: underline;
                left:570px">Directeur Générale</h5>
            </div>
        </div>
        <div class="footer" style=" position: relative;
        bottom: -30px;
        margin: 20px;
        border-top: 2px solid green ;">
            <table style="font-size: 12px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            width: 100%;">
                <tr>
                    <td>Siège Sociale</td>
                    <td>Coordonnées</td>
                    <td>Coordonnées Bancaires</td>
                </tr>
                <tr>
                    <td>Cité Bousmaha Lot N° 91 coop "EL HANA"</td>
                    <td>AZIMUT Business Solutions </td>
                    <td>Banque: BNA                    </td>
                </tr>
                <tr>
                    <td>N° 11 - Bainem - Bouzarea - Alger - Algérie</td>
                    <td>Tel: +213 23 29 81 19 </td>
                    <td>Agence: Baba hacen                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Email: contact@azimutbs.com</td>
                    <td>RIB: 0100436030000149161             </td>
                </tr>
                <tr>
                    <td></td>
                    <td>Site Web: www.azimutbs.com</td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
{{-- @include('sweetalert::alert') --}}
@endsection











