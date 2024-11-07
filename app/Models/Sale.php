<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'expiration_date_rental',
        'payment_date_rental',
        'total_rental',
        'tarp_date_change',
        'total_tarp',
    ];

    public function externalmedias()
    {
        return $this->belongsToMany(Externalmedia::class, 'externalmedia_sale');
    }
}
