<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mediatype extends Model
{
    protected $fillable = ['name', 'description'];

    public function externalmedia()
    {
        return $this->hasMany(Externalmedia::class);
    }
}
