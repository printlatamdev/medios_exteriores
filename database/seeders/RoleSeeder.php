<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// IMPORTADAS POR EL PROGRAMADOR
// SON DE LARAVEL PERMISSION
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Superadmin', 'guard_name' => 'web']);
        Role::create(['name' => 'Ventas', 'guard_name' => 'web']);
    }
}
