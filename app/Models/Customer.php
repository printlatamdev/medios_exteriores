<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'description',
        'customer_type',
    ];

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }
}
