<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'total_bail',
        'expiration_date_bail',
        'payment_date_bail',
        'total_damageinsurance',
        'expiration_date_damageinsurance',
        'payment_date_damageinsurance',
        'total_municipality',
        'expiration_date_municipality',
        'payment_date_municipality',
        'total_rental',
        'expiration_date_rental',
        'payment_date_rental',
        'total_maintenance',
        'maintenance_description',
        'illuminated',
        'electricity_provider',
        'electricity_NIC_NIS',
        'electricity_new_NC',
        'total_electricity',
        'expiration_date_electricity',
        'payment_date_electricity',
        'total_payment',
    ];

    public function externalmedias()
    {
        return $this->belongsToMany(Externalmedia::class, 'budget_externalmedia');
    }
}
