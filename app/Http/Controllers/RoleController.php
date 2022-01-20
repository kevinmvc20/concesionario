<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.asignar')->only('create');
        $this->middleware('can:roles.storeRolPermiso')->only('storeRolPermiso');
        $this->middleware('can:roles.asignarRol')->only('asignarRol');
        $this->middleware('can:roles.guardarRol')->only('guardarRol');
        $this->middleware('can:roles.crear')->only('crearRol');
        $this->middleware('can:roles.guardarNuevoRol')->only('guardarNuevoRol');
    }

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
        $mytime= Carbon::now('America/La_Paz');
        $permisos = $request->permisos;
        $rol = Role::find($id);
        foreach($permisos as $permiso){
            $perm = Permission::find($permiso);
            $perm->assignRole($rol);
            DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['rol: '.$rol->name,'asignar',$permiso->name,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        }
        return redirect()->route('roles.index');
    }
    public function asignarRol(){
        $usuarios = User::all();
        $roles = Role::all();
        return view('usuario.roles_permisos.roles',['usuarios'=>$usuarios,'roles'=>$roles]);
    }
    public function guardarRol(Request $request){
        $mytime= Carbon::now('America/La_Paz');
        $usuario = User::findOrFail($request->usuario_id);
        $roles = $request->roles;
        foreach ($roles as $rol) {
            $rolAsignado = Role::findOrFail($rol);
            $usuario->assignRole($rolAsignado);
            DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['rol: '.$rolAsignado->name,'asignar',$usuario->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        }
        return redirect()->route('roles.index');
    }
    public function crearRol(){
        return view('usuario.roles_permisos.crearRol');
    }
    public function guardarNuevoRol(Request $request){
        $mytime= Carbon::now('America/La_Paz');
        Role::create(['name' => $request->rol_nombre]);
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['roles','crear',$request->rol_nombre,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('roles.index');
    }
    
}
