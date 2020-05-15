<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rol;
use App\Tipus_treball;

class Treball extends Model
{
    public function rols(){
        return $this->belongsTo(Rol::class);
    }

    public function tipus_treball(){
        return $this->belongsTo(Tipus_treball::class,'id_tipus_treball');
    }
}
