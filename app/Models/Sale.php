<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'begin_date_rental',
        'expiration_date_rental',
        'payment_date_rental',
        'total_rental',
        'contract_type',
        'tarp_date_change',
        'total_tarp',
        'total',
        'quote',
        'purchaseorder',
    ];

    public function externalmedias()
    {
        return $this->belongsToMany(Externalmedia::class, 'externalmedia_sale');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
