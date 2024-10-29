<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

// IMPORT HECHAS POR EL PROGRAMADOR
use function GuzzleHttp\Promise\each;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MediatypeSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(MunicipalitySeeder::class);
    }
}
