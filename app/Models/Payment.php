<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_date',
        'sale_id', //contrato
        'payment_term',
        'scheduled_payments',
        'status',
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }
}
