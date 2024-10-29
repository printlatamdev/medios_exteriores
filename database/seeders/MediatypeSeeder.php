<?php

namespace Database\Seeders;

use App\Models\Mediatype;
use Illuminate\Database\Seeder;

class MediatypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Espectacular',
            'Standar',
            'Pantalla',
            'Valla',
            'Muppi',
            'Pasarela',
            'Antena',
        ];
        foreach ($types as $items) {
            Mediatype::create([
                'name' => $items,
                'description' => 'No description',
            ]);
        }
    }
}
