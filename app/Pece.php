<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle;
use App\Tipus_vehicle_pece;

class Pece extends Model
{
    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function tipus_vehicle_pece()
    {
        return $this->hasMany(Tipus_vehicle_pece::class);
    }
}
