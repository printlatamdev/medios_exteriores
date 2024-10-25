<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function GuzzleHttp\Promise\each;

// IMPORT HECHAS POR EL PROGRAMADOR
use  App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // ROLES Y PERMISOS, AQUI SE LLAMA TODO LOS SEEDER
        $this->call(RoleSeeder::class);
        // USUARIOS BASE
        $this->call(UserSeeder::class);
        // AGREGAR LOS DATA DE TABLA PAIS
        $this->call(PaisSeeder::class);


        // DESPUES DE CREARLOS LOS RECORRO Y POR CADA ELEMENTO USER, QUIERO QUE LE ASIGNE EL ROL DEVELOPMENT
        // User::factory(10)->create()->each(function($user){
        //     $user->assignRole('Development');
        // });

    }
}
