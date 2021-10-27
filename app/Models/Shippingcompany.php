<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shippingcompany extends Model
{
    use HasFactory;
    public function shipschedules()
    {
        return $this->hasMany(Shipschedule::class);
    }

    public function ships()
    {
        return $this->hasMany(Ship::class);
    }
}
