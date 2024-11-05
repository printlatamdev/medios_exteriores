<?php

namespace App\Imports;

use App\Models\Externalmedia;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

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
            'district_id' => $row[3],
            'address' => $row[4],
            'location' => $row[5],
            'gallery' => $row[6],
            'width' => $row[7],
            'height' => $row[8],
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
