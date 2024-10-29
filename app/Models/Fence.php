<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fence extends Model
{
    protected $fillable = [
        'code', 'status', 'typefence_id', 'location_id', 'address',
    ];

    public function typefence()
    {
        return $this->belongsTo(Typefence::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
