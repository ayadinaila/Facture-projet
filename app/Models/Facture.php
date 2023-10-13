<?php

namespace App\Models;

use App\Models\User;
use App\Models\Client;
use App\Models\Factureproduit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    protected $guarded = [];

    // filled();


    public function client()
    {
        return $this->belongsTo(Client::class,'id_client');
    }

    public function facture_produit(){
            return $this->hasMany(Factureproduit::class,'id_facture');

    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

}
