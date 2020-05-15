<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pece;
use App\Tipus_vehicle;

class Tipus_vehicle_pece extends Model
{
    protected $table='tipus_vehicles_peces';
    
    public function pece(){
        return $this->belongsTo(Pece::class);
    }

    public function tipus_vehicle(){
        return $this->belongsTo(Tipus_vehicle::class);
    }
}
