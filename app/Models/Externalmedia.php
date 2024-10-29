<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Externalmedia extends Model
{
    protected $fillable = [
        'code', 'status', 'mediatype_id', 'location_id', 'address',
    ];

    public function mediatype()
    {
        return $this->belongsTo(Mediatype::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
