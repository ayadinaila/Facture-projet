<?php

namespace App\Models;

use App\Models\Facture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    /* or  protected $fillable=[ les attributs de la base ];*/

    protected $guarded = [];

    public function factures()
    {
        return $this->hasMany(Facture::class,'id_client');
    }
}
