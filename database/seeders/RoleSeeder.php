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
        $admin = Role::create(['name'=>'Superadmin', 'guard_name'=>'web']);
        $ventas = Role::create(['name'=>'Ventas', 'guard_name'=>'web']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $ventas]);
        Permission::create(['name' => 'users.index'])->syncRoles([$admin, $ventas]);
        Permission::create(['name' => 'users.show'])->syncRoles([$admin, $ventas]);
        Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);

    }
}
