<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Inventario']);

        Permission::create(['name' => 'admin.home'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'admin.vehiculos.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.vehiculos.create'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.vehiculos.store'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.vehiculos.edit'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.vehiculos.destroy'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.vehiculos.show'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.vehiculos.update'])->syncRoles([$role1,$role2]);



        
    }
}
