<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

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
        Permission::create(['name'=>'usuarios.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'usuarios.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'usuarios.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'usuarios.destroy'])->syncRoles([$Adm]);
        //marca
        Permission::create(['name'=>'marcas.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'marcas.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'marcas.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'marcas.edit'])->syncRoles([$Adm]);
        Permission::create(['name'=>'marcas.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'marcas.update'])->syncRoles([$Adm]);
        //categoria
        Permission::create(['name'=>'categorias.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'categorias.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'categorias.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'categorias.edit'])->syncRoles([$Adm]);
        Permission::create(['name'=>'categorias.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'categorias.update'])->syncRoles([$Adm]);
        //vehiculo
        Permission::create(['name'=>'vehiculos.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'vehiculos.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'vehiculos.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'vehiculos.edit'])->syncRoles([$Adm]);
        Permission::create(['name'=>'vehiculos.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'vehiculos.show'])->syncRoles([$Adm]);
        Permission::create(['name'=>'vehiculos.update'])->syncRoles([$Adm]);
        //proveedor
        Permission::create(['name'=>'proveedores.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'proveedores.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'proveedores.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'proveedores.edit'])->syncRoles([$Adm]);
        Permission::create(['name'=>'proveedores.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'proveedores.update'])->syncRoles([$Adm]);
        //compras
        Permission::create(['name'=>'compras.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'compras.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'compras.store'])->syncRoles([$Adm]);
        //Permission::create(['name'=>'compras.edit'])->syncRoles([$Adm]);
        Permission::create(['name'=>'compras.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'compras.show'])->syncRoles([$Adm]);
        //almacen
        Permission::create(['name'=>'almacenes.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'almacenes.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'almacenes.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'almacenes.destroy'])->syncRoles([$Adm]);
        //tipo almacen
        Permission::create(['name'=>'tipoalmacenes.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'tipoalmacenes.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'tipoalmacenes.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'tipoalmacenes.destroy'])->syncRoles([$Adm]);
        //venta
        Permission::create(['name'=>'ventas.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'ventas.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'ventas.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'ventas.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'ventas.show'])->syncRoles([$Adm]);
        //contratos
        Permission::create(['name'=>'contratos.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'contratos.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'contratos.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'contratos.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'contratos.show'])->syncRoles([$Adm]);
        //tipoContratos
        Permission::create(['name'=>'tipocontratos.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'tipocontratos.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'tipocontratos.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'tipocontratos.destroy'])->syncRoles([$Adm]);
        //credito
        Permission::create(['name'=>'creditos.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'creditos.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'creditos.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'creditos.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'creditos.show'])->syncRoles([$Adm]);
        //cliente
        Permission::create(['name'=>'clientes.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'clientes.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'clientes.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'clientes.edit'])->syncRoles([$Adm]);
        Permission::create(['name'=>'clientes.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'clientes.show'])->syncRoles([$Adm]);
        Permission::create(['name'=>'clientes.update'])->syncRoles([$Adm]);
        //Bitacora
        Permission::create(['name'=>'bitacoras.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'bitacoras.pdf'])->syncRoles([$Adm]);
        //Cuota
        Permission::create(['name'=>'cuotas.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'cuotas.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'cuotas.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'cuotas.destroy'])->syncRoles([$Adm]);
        Permission::create(['name'=>'cuotas.show'])->syncRoles([$Adm]);
        //movimientos almacen
        Permission::create(['name'=>'movimientoAlmacen.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'movimientoAlmacen.create'])->syncRoles([$Adm]);
        Permission::create(['name'=>'movimientoAlmacen.store'])->syncRoles([$Adm]);
        Permission::create(['name'=>'movimientoAlmacen.confirmar'])->syncRoles([$Adm]);
        Permission::create(['name'=>'movimientoAlmacen.show'])->syncRoles([$Adm]);
        //Roles y permisos
        Permission::create(['name'=>'roles.index'])->syncRoles([$Adm]);
        Permission::create(['name'=>'roles.asignar'])->syncRoles([$Adm]);
        Permission::create(['name'=>'roles.storeRolPermiso'])->syncRoles([$Adm]);
        Permission::create(['name'=>'roles.asignarRol'])->syncRoles([$Adm]);
        Permission::create(['name'=>'roles.guardarRol'])->syncRoles([$Adm]);
        Permission::create(['name'=>'roles.crear'])->syncRoles([$Adm]);
        Permission::create(['name'=>'roles.guardarNuevoRol'])->syncRoles([$Adm]);

        //asignacion
        $usuario = User::findOrFail(1);
        $usuario->assignRole($Adm);

        
    }
}
