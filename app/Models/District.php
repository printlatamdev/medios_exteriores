<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = ['name', 'municipality_id'];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function externalmedia()
    {
        return $this->hasMany(Externalmedia::class);
    }
}
