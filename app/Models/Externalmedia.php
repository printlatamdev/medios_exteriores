<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Externalmedia extends Model
{
    protected $table = 'externalmedia';

    protected $fillable = [
        'code', 'status', 'mediatype_id', 'district_id', 'address', 'location', 'gallery', 'width', 'height',
    ];

    protected $casts = [
        'status' => 'boolean',
        'gallery' => 'array',
        'location' => 'json',
    ];

    protected $appends = [
        //'location',
        'code_address',
    ];

    public function getCodeAddressAttribute()
    {
        return $this->code.' '.$this->address;
    }

    public function mediatype()
    {
        return $this->belongsTo(Mediatype::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function budgets()
    {
        return $this->belongsToMany(Budget::class, 'budget_externalmedia');
    }
}
