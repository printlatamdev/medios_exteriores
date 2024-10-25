<?php

namespace Database\Seeders;

use App\Models\User;
// IMPORTACIONES HECHAS POR EL PROGAMADOR
use Illuminate\Database\Seeder;
// SON DE LARAVEL PERMISSION
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'phone_number' => '88888888',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //$this->encrypt('password', 'Cpmp-Sv-2022_#!*/'), // password
            // 'idroles'           => 1,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ])->assignRole('admin');

        User::create([
            'first_name' => 'Nancy',
            'last_name' => 'Espinoza',
            'email' => 'nancy@gmail.com',
            'email_verified_at' => now(),
            'phone_number' => '77777777',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // $this->encrypt('password', 'Cpmp-Sv-2022_#!*/')// password
            // 'idroles'           => 2,
            'remember_token' => \Illuminate\Support\Str::random(10),
        ])->assignRole('clientes');

    }
}
