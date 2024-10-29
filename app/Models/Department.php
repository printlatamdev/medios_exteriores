<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name'];

    public function municipality()
    {
        return $this->hasMany(Municipality::class);
    }

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}