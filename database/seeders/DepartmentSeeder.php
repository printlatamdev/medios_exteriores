<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $data = [
            'Ahuachapán', 
            'Cabañas',
            'Chalatenango',
            'Cuscatlán', 
            'La Libertad',
            'La Paz',
            'La Unión',
            'Morazán', 
            'San Miguel', 
            'San Salvador', 
            'San Vicente', 
            'Santa Ana', 
            'Sonsonate', 
            'Usulután',
        ];
        foreach($data as $items) {
            Department::create([ 'name' => $items ]);
        }
    }
}
