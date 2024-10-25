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

        /*
            Admin       => All
            Manager     => Ver listado de usuarios y ver usuarios
            Development => dashboard
        */
        // CREA ESTOS ROLES EN TABLA ROLE A TRAVES DE MODEL ROLE
        $admin = Role::create(['name' => 'admin'   /*, 'team_id' => 1*/]);
        $clientes = Role::create(['name' => 'clientes'/*, 'team_id' => 2*/]);
        // $development = Role::create(['name' => 'Development']);

        // CREA ESTOS PERMISOS EN TABLA PERMISION A TRAVES DE MODEL Permission
        // Aqui se puede colocar el nombre de la ruta puesta en web.php pasa saber a que se esta dando acceso, syncRoles asigna varios roles
        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $clientes/*, $development*/]);
        Permission::create(['name' => 'users.index'])->syncRoles([$admin, $clientes]);
        Permission::create(['name' => 'users.show'])->syncRoles([$admin, $clientes]);
        Permission::create(['name' => 'users.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$admin]);

    }
}
