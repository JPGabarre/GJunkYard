<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Treball;

class Rol extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function treballs()
    {
        return $this->hasMany(Treball::class);
    }
}
