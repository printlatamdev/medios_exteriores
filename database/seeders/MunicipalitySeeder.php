<?php

namespace Database\Seeders;

use App\Models\Municipality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Ahuachapán Norte', 'depto' => 1], 
            ['name' => 'Ahuachapán Centro', 'depto' => 1],
            ['name' => 'Ahuachapán Sur', 'depto' => 1],
            ['name' => 'Cabañas Este', 'depto' => 2],
            ['name' => 'Cabañas Oeste', 'depto' => 2],
            ['name' => 'Chalatenango Norte', 'depto' => 3],
            ['name' => 'Chalatenango Centro', 'depto' => 3],
            ['name' => 'Chalatenango Sur', 'depto' => 3],
            ['name' => 'Cuscatlán Norte', 'depto' => 4],
            ['name' => 'Cuscatlán Sur', 'depto' => 4],
            ['name' => 'La Libertad Norte', 'depto' => 5],
            ['name' => 'La Libertad Centro', 'depto' => 5],
            ['name' => 'La Libertad Oeste', 'depto' => 5],
            ['name' => 'La Libertad Este', 'depto' => 5],
            ['name' => 'La Libertad Costa', 'depto' => 5],
            ['name' => 'La Libertad Sur', 'depto' => 5],
            ['name' => 'La Paz Oeste', 'depto' => 6],
            ['name' => 'La Paz Centro', 'depto' => 6],
            ['name' => 'La Paz Este', 'depto' => 6],
            ['name' => 'La Unión Norte', 'depto' => 7],
            ['name' => 'La Unión Sur', 'depto' => 7],
            ['name' => 'Morazán Norte', 'depto' => 8],
            ['name' => 'Morazán Sur', 'depto' => 8],
            ['name' => 'San Miguel Norte', 'depto' => 9],
            ['name' => 'San Miguel Centro', 'depto' => 9],
            ['name' => 'San Miguel Oeste', 'depto' => 9],
            ['name' => 'San Salvador Norte', 'depto' => 10],
            ['name' => 'San Salvador Oeste', 'depto' => 10],
            ['name' => 'San Salvador Este', 'depto' => 10],
            ['name' => 'San Salvador Centro', 'depto' => 10],
            ['name' =>'San Vicente Norte', 'depto' => 11],
            ['name' =>'San Vicente Sur', 'depto' => 11],
            ['name' =>'Santa Ana Norte', 'depto' => 12],
            ['name' =>'Santa Ana Centro', 'depto' => 12],
            ['name' =>'Santa Ana Este', 'depto' => 12],
            ['name' =>'Santa Ana Oeste', 'depto' => 12],
            ['name' =>'Sonsonate Norte', 'depto' => 13],
            ['name' =>'Sonsonate Centro', 'depto' => 13],
            ['name' =>'Sonsonate Este', 'depto' => 13],
            ['name' =>'Sonsonate Oeste', 'depto' => 13],
            ['name' =>'Usulután Norte', 'depto' => 14],
            ['name' =>'Usulután Este', 'depto' => 14],
            ['name' =>'Usulután Oeste', 'depto' => 14]
        ];
        foreach($data as $items) {
            Municipality::create([ 
                'name' => $items['name'],
                'department_id' => $items['depto']
            ]);
        }
    }
}
