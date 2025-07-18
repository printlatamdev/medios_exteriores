<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'begin_date_rental',
        'expiration_date_rental',
        'total_rental',
        'contract_type',
        'tarp_date_change',
        'total_tarp',
        'total',
        'quote',
        'purchaseorder',
        'months',
        'customer_id',
    ];

    protected $casts = [
        'quote' => 'array',
        'purchaseorder' => 'array',
    ];

   public function externalmedias()
{
    return $this->belongsToMany(Externalmedia::class);
}


    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($sale) {
            $sale->externalmedias()->detach(); // <- elimina relaciones en tabla intermedia
        });
    }

        
}
