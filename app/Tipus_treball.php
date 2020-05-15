<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Treball;

class Tipus_treball extends Model
{
    public function treball()
    {
        return $this->hasMany(Treball::class);
    }
}
