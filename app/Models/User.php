<?php

namespace App\Models;

use App\Models\Facture;
// use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasFactory;
    protected $guarded = [];

    public function user_facture()
    {
        return $this->hasMany(Facture::class,'id_user');
    }
}
