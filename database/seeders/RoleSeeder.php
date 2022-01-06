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
        //Roles
        $Adm = Role::create(['name'=>'Admin']);
        Role::create(['name'=>'Encargado']);
        //---------------permisos------------------------
        //user
        Permission::create(['name'=>'usuarios.index']);
        Permission::create(['name'=>'usuarios.create']);
        Permission::create(['name'=>'usuarios.store']);
        Permission::create(['name'=>'usuarios.destroy']);
        //marca
        Permission::create(['name'=>'marcas.index']);
        Permission::create(['name'=>'marcas.create']);
        Permission::create(['name'=>'marcas.store']);
        Permission::create(['name'=>'marcas.edit']);
        Permission::create(['name'=>'marcas.destroy']);
        Permission::create(['name'=>'marcas.update']);
        //categoria
        Permission::create(['name'=>'categorias.index']);
        Permission::create(['name'=>'categorias.create']);
        Permission::create(['name'=>'categorias.store']);
        Permission::create(['name'=>'categorias.edit']);
        Permission::create(['name'=>'categorias.destroy']);
        Permission::create(['name'=>'categorias.update']);
        //vehiculo
        Permission::create(['name'=>'vehiculos.index']);
        Permission::create(['name'=>'vehiculos.create']);
        Permission::create(['name'=>'vehiculos.store']);
        Permission::create(['name'=>'vehiculos.edit']);
        Permission::create(['name'=>'vehiculos.destroy']);
        Permission::create(['name'=>'vehiculos.show']);
        Permission::create(['name'=>'vehiculos.update']);
        //proveedor
        Permission::create(['name'=>'proveedores.index']);
        Permission::create(['name'=>'proveedores.create']);
        Permission::create(['name'=>'proveedores.store']);
        Permission::create(['name'=>'proveedores.edit']);
        Permission::create(['name'=>'proveedores.destroy']);
        Permission::create(['name'=>'proveedores.update']);
        //compras
        Permission::create(['name'=>'compras.index']);
        Permission::create(['name'=>'compras.create']);
        Permission::create(['name'=>'compras.store']);
        Permission::create(['name'=>'compras.edit']);
        Permission::create(['name'=>'compras.destroy']);
        Permission::create(['name'=>'compras.show']);
        //almacen
        Permission::create(['name'=>'almacenes.index']);
        Permission::create(['name'=>'almacenes.create']);
        Permission::create(['name'=>'almacenes.store']);
        Permission::create(['name'=>'almacenes.destroy']);
        //tipo almacen
        Permission::create(['name'=>'tipoalmacenes.index']);
        Permission::create(['name'=>'tipoalmacenes.create']);
        Permission::create(['name'=>'tipoalmacenes.store']);
        Permission::create(['name'=>'tipoalmacenes.destroy']);
        //Roles y permisos
        Permission::create(['name'=>'roles.index']);
        Permission::create(['name'=>'roles.asignar']);
        Permission::create(['name'=>'roles.storeRolPermiso']);
        Permission::create(['name'=>'roles.asignarRol']);
        Permission::create(['name'=>'roles.guardarRol']);
        Permission::create(['name'=>'roles.crear']);
        Permission::create(['name'=>'roles.guardarNuevoRol']);

        //asignacion
        $usuario = User::findOrFail(1);
        $usuario->givePermissionTo([
            'usuarios.index',
            'usuarios.create',
            'usuarios.store',
            'usuarios.destroy',
            'roles.index',
            'roles.asignar',
            'roles.storeRolPermiso',
            'roles.asignarRol',
            'roles.guardarRol',
            'roles.crear',
            'roles.guardarNuevoRol'
        ]);

        
    }
}
