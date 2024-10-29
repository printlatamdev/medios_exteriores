<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BudgetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total_bail' => $this->total_bail,
            'expiration_date_bail' => $this->expiration_date_bail,
            'payment_date_bail' => $this->payment_date_bail,
            'total_damageinsurance' => $this->total_damageinsurance,
            'expiration_date_damageinsurance' => $this->expiration_date_damageinsurance,
            'payment_date_damageinsurance' => $this->payment_date_damageinsurance,
            'total_municipality' => $this->total_municipality,
            'expiration_date_municipality' => $this->expiration_date_municipality,
            'payment_date_municipality' => $this->payment_date_municipality,
            'total_rental' => $this->total_rental,
            'expiration_date_rental' => $this->expiration_date_rental,
            'payment_date_rental' => $this->payment_date_rental,
            'total_maintenance' => $this->total_maintenance,
            'illuminated' => $this->illuminated,
            'electricity_provider' => $this->electricity_provider,
            'electricity_NIC_NIS' => $this->electricity_NIC_NIS,
            'electricity_new_NC' => $this->electricity_new_NC,
            'total_electricity' => $this->total_electricity,
            'expiration_date_electricity' => $this->expiration_date_electricity,
            'payment_date_electricity' => $this->payment_date_electricity,
            'total_payment' => $this->total_payment,
        ];
    }
}
