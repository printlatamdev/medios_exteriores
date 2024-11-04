<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Externalmedia;
use App\Models\Mediatype;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class MediaImport implements ToModel
{
    /**
     * @param  Collection  $collection
     */
    public function model(array $row)
    {
        return new Externalmedia([
            'code' => $row['code'],
            'status' => $row['status'],
            'mediatype_id' => $row['mediatype_id'],
            'district_id' => $row['district_id'],
            'address' => $row['address'],
            'location' => $row['location'],
            'gallery' => $row['gallery'],
            'width' => $row['width'],
            'height' => $row['height'],
        ]);
    }

    public function getMediatypeId($mediatype)
    {
        $mediatype = Mediatype::where('name', $mediatype)->get();

        return $mediatype->id;
    }

    public function getDistrictId($district)
    {
        $district = District::where('name', $district)->get();

        return $district->id;
    }
}
