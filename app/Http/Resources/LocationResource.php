<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'department' => new DepartmentResource($this->department),
            'municipality' => new MunicipalityResource($this->municipality),
            'district' => new DistrictResource($this->district),
        ];
    }
}
