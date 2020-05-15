<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tipus_vehicle;
use App\Pece;

class Vehicle extends Model
{
    public function tipus_vehicle()
    {
        return $this->belongsTo(tipus_vehicle::class,'id_tipus_vehicle');
    }

    public function pece()
    {
        return $this->hasMany(Pece::class);
    }
}
