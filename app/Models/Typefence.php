<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typefence extends Model
{
    protected $fillable = ['name', 'description'];

    public function fence()
    {
        return $this->hasMany(Fence::class);
    }
}
