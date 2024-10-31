<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = [
        'expiration_date_bail',
        'payment_date_bail',
        'total_bail',

        'expiration_date_damageinsurance',
        'payment_date_damageinsurance',
        'total_damageinsurance',

        'expiration_date_municipality',
        'payment_date_municipality',
        'total_municipality',

        'expiration_date_rental',
        'payment_date_rental',
        'total_rental',

        'maintenance_description',
        'total_maintenance',

        'illuminated',
        'electricity_provider',
        'electricity_NIC_NIS',
        'electricity_new_NC',
        'expiration_date_electricity',
        'payment_date_electricity',
        'total_electricity',

        'total_payment',
    ];

    public function externalmedias()
    {
        return $this->belongsToMany(Externalmedia::class, 'budget_externalmedia');
    }
}
