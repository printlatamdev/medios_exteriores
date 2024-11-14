<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Externalmedia extends Model
{
    protected $table = 'externalmedia';

    protected $fillable = [
        'code',
        'status',
        'mediatype_id',
        'district_id',
        'address',
        'location',
        'gallery',
        'width',
        'height',
        'traffic_flow',
        'lighting',
    ];

    protected $casts = [
        'status' => 'boolean',
        'gallery' => 'array',
        'location' => 'json',
    ];

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

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'externalmedia_sale');
    }
}
