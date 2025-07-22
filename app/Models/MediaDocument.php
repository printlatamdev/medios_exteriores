<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaDocument extends Model
{
    protected $fillable = [
        'externalmedia_id',
        'document_type',
        'document_name',
        'issued_at',
        'expires_at',
        'no_expiry',
        'file_path',
        'notes',
    ];

    protected $casts = [
        'issued_at' => 'datetime',
        'expires_at' => 'datetime',
        'no_expiry' => 'boolean',
    ];

    public function externalmedia()
    {
        return $this->belongsTo(Externalmedia::class);
    }

    public function isExpired(): bool
    {
        return !$this->no_expiry && $this->expires_at && $this->expires_at->isPast();
    }

    public function isAboutToExpire(): bool
    {
        return !$this->no_expiry && $this->expires_at && $this->expires_at->isBetween(now(), now()->addDays(30));
    }
    
}
