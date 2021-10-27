<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;
    
    public function shipschedules()
    {
        return $this->hasMany(Shipschedule::class);
    }

    public function shipcompanies()
    {
        return $this->belongsTo(Shippingcompany::class, 'shippingcompany_id', 'id');

        // return $this->belongsTo(Shippingcompany::class);

    }
}
