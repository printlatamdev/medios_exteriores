<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'department_id', 'municipality_id', 'district_id'
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function municipality(){
        return $this->belongsTo(Municipality::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }
}
