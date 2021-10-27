<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipschedule extends Model
{
    use HasFactory;

    public function shipcompanies()
    {
        return $this->belongsTo(Shippingcompany::class, 'shippingcompany_id', 'id');
    }

    public function ships()
    {
        return $this->belongsTo(Ship::class, 'ship_id', 'id');
    }
}
