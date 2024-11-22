<?php

namespace App\Imports;

use App\Models\Externalmedia;
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
            'code' => $row[0],
            'status' => $row[1],
            'mediatype_id' => $row[2],
            'department_id' => $row[3],
            'municipality_id' => $row[4],
            'district_id' => $row[5],
            'address' => $row[6],
            'location' => $row[7],
            'gallery' => $row[8],
            'width' => $row[9],
            'height' => $row[10],
            'traffic_flow' => $row[11],
            'lighting' => $row[12],
        ]);
    }
    /**
    public function batchSize(): int
    {
        return 4000;
    }

    public function chunkSize(): int
    {
        return 4000;
    }
     */
}
