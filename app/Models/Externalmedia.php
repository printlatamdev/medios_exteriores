<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Externalmedia extends Model
{
    protected $fillable = [
        'code', 'status', 'mediatype_id', 'district_id', 'address', 'gallery', 'width', 'height',
    ];

    protected $casts = [
        'status' => 'boolean',
        'gallery' => 'array',
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
}
