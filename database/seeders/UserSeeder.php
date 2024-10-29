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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 
            'remember_token' => \Illuminate\Support\Str::random(10),
        ])->assignRole('admin');

    }
}
