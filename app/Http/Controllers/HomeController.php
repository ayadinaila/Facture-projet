<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = [now()->addYear(-1)->format('Y-m-d'),now()->format('Y-m-d')];
        $prof=Facture::select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
            ->where('type_facture','Proforma')
            ->whereBetween('created_at', $date)
            ->groupBy('monthname')
            ->get();

        $countprof = $prof->map(function($item,$key){
            return $item->count;
        });

        $monthsprof = $prof->map(function($item,$key){
            return $item->monthname;
        });

        $fact=Facture::select(DB::raw("(COUNT(*)) as count"),DB::raw("MONTHNAME(created_at) as monthname"))
            ->where('type_facture','Facture')
            ->whereBetween('created_at', $date)
            ->groupBy('monthname')
            ->get();

        $countfact = $fact->map(function($item,$key){
            return $item->count;
        });

        $monthsfact = $fact->map(function($item,$key){
            return $item->monthname;
        });


        // $months = ['01','02'];
        // $data_pro = [];
        // foreach ($months as $key => $month) {
        //     $proforma=Facture::where('type_facture', 'Proforma')->whereMonth('created_at',$month)->count();
        //     $data_pro[] = $proforma;
        // }

        $facture=Facture::where('type_facture', 'Facture')->count();
        $proforma=Facture::where('type_facture', 'Proforma')->count();
        $projects=Produit::all()->count();
        $priceproforma=Facture::where('type_facture', 'Proforma')->sum('totale_ttc');
        // dd($priceproforma);
        $pricefacture=Facture::where('type_facture', 'Facture')->sum('totale_ttc');
        // $facturearray=Facture::select('totale_ttc')->where('type_facture', 'Facture')->get()->toArray();
        // dd($facturearray);
        // dd($prof);
        return view('home',compact('proforma','facture','projects','priceproforma','pricefacture','countprof','monthsprof','countfact'));

        // $months = ['01','02'];
        // $data_pro = [];
        // foreach ($months as $key => $month) {
        //     $proforma=Facture::where('type_facture', 'Proforma')->whereMonth('created_at',$month)->whereYear('created_at',date('Y'))->count();
        //     $data_pro[] = $proforma;
        // }
        // $proforma=Facture::where('type_facture', 'Proforma')->whereBetween('created_at',[date('Y-m-d'),now()->addYear(-1)->format('Y-m-d')])->get();
        // $proforma->groupBy(function($item,$key){
        //     return $item->created_at;
        // });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
