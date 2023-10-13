<?php

namespace App\Models;

use App\Models\Factureproduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function produit_facture(){
    return $this->hasMany(Factureproduit::class,'id_produit');

}
}



