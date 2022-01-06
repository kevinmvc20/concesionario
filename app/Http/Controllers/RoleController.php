<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        $permisos = Permission::all();
        return view('usuario.roles_permisos.index',['roles'=>$roles, 'permisos'=>$permisos]);
    }
    public function asignar(Request $id){
        $rol = Role::findorfail($id->id);
        $permisos = Permission::all();
        return view('usuario.roles_permisos.asignar',['rol'=>$rol,'permisos'=>$permisos]);
    }
    public function storeRolPermiso(Request $request, $id){
        $permisos = $request->permisos;
        $rol = Role::find($id);
        foreach($permisos as $permiso){
            $perm = Permission::find($permiso);
            $perm->assignRole($rol);
        }
        return redirect()->route('roles.index');
    }
    public function asignarRol(){
        $usuarios = User::all();
        $roles = Role::all();
        return view('usuario.roles_permisos.roles',['usuarios'=>$usuarios,'roles'=>$roles]);
    }
    public function guardarRol(Request $request){
        $usuario = User::findOrFail($request->usuario_id);
        $roles = $request->roles;
        foreach ($roles as $rol) {
            $rolAsignado = Role::findOrFail($rol);
            $usuario->assignRole($rolAsignado);
        }
        return redirect()->route('roles.index');
    }
    public function crearRol(){
        return view('usuario.roles_permisos.crearRol');
    }
    public function guardarNuevoRol(Request $request){
        Role::create(['name' => $request->rol_nombre]);
        return redirect()->route('roles.index');
    }
    
}
