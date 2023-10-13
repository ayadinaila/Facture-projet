<?php

namespace App\Models;

use App\Models\Facture;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factureproduit extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function facture(){
        return $this-belongsTo(Facture::class,'id_facture');

}

public function produit(){
    return $this->belongsTo(Produit::class,'id_produit');

}
}
