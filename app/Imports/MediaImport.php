<?php

namespace App\Imports;

use App\Models\District;
use App\Models\Externalmedia;
use Illuminate\Support\Collection;
use App\Models\Mediatype;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;

class MediaImport implements ToCollection
{
    use Importable;
    /**
     * @param  Collection  $collection
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            dd($row);
            Externalmedia::create([
                'code' => $row[0],
                'status' => $row[1],
                'mediatype_id' => $row[2],
                'district_id' => $row[3],
                'address' => $row[4],
                'location' => $row[5],
                'gallery' => $row[6],
                'width' => $row[7],
                'height' => $row[8],
            ]);
        }
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
