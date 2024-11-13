<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_date', 
        'contract_id', 
        'payment_term', 
        'scheduled_payments',
        'status',
    ];
}
