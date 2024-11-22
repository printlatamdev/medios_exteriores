<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable = ['name', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function district()
    {
        return $this->hasMany(District::class);
    }

    public function externalmedia()
    {
        return $this->hasMany(Externalmedia::class);
    }
}
