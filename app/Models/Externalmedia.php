<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Externalmedia extends Model
{
    protected $table = 'externalmedia';

    protected $fillable = [
        'code',
        'clase', // 👈 Asegúrate de que esté aquí
        'location_embed', // 👈 Este también
        'status',
        'traffic_flow',
        'lighting',
        'rental',
        'production',
        'gallery',
        'department_id',
        'municipality_id',
        'district_id',
        'address',
        'width',
        'height',
        'mediatype_id',
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
        return $this->belongsToMany(Sale::class);
    }


    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }
    public function isRented(): bool
    {
        $today = now()->toDateString();

        return $this->sales()
            ->whereDate('begin_date_rental', '<=', $today)
            ->whereDate('expiration_date_rental', '>=', $today)
            ->exists();
    }


    public function getRentalPeriod(): ?array
    {
        $rental = $this->sales()
            ->whereDate('begin_date_rental', '<=', now())
            ->whereDate('expiration_date_rental', '>=', now())
            ->first();

        return $rental ? [
            'from' => $rental->begin_date_rental,
            'to' => $rental->expiration_date_rental,
        ] : null;
    }
    public static function disponiblesParaContrato()
    {
        $fechaHoy = now()->toDateString();

        return self::where('status', true) // Disponible manualmente
            ->whereDoesntHave('sales', function ($query) use ($fechaHoy) {
                $query->whereDate('begin_date_rental', '<=', $fechaHoy)
                    ->whereDate('expiration_date_rental', '>=', $fechaHoy);
            })
            ->pluck('code', 'id');
    }

}
