<?php

namespace App\Models;

use App\Models\country;
use Illuminate\Database\Eloquent\Model;

class shippingcoast extends Model
{
    public function country()
    {
        return $this->belongsTo(country::class, 'country_id');
    }
}
