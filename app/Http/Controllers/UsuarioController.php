<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PersonaRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('can:usuarios.index')->only('index');
        $this->middleware('can:usuarios.create')->only('create');
        $this->middleware('can:usuarios.store')->only('store');
        $this->middleware('can:usuarios.destroy')->only('destroy');
    }

    public static $tipo_usuario=1;

    public function index(Request $request)
    {
        if($request){
            $consulta = trim($request->input('buscador'));
            
            $usuarios = User::with('persona')
            ->orWhere('id','LIKE','%'.$consulta.'%')
            ->orderBy('id','asc')
            ->paginate(6);
        }
        return view('usuario.usuario.index',['usuarios' => $usuarios,'buscador' => $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('usuario.usuario.create',['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonaRequest $request)
    {
        $persona = new Persona();
        $persona->ci = $request->input('ci');
        $persona->nombre = $request->input('nombre');
        $persona->telefono = $request->input('telefono');
        $persona->email = $request->input('email');
        $persona->direccion = $request->input('direccion');
        $persona->tipo=self::$tipo_usuario;
        $persona->save();

        $usuario = new User();
        $usuario->email= $request->input('email');
        $usuario->password = bcrypt($request->input('password'));
        $usuario->id_persona = $persona->id;
        
        $usuario->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Usuario','crear',$usuario->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $persona = Persona::findOrFail($usuario->id_persona);
        $usuario->delete();
        $persona->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Usuario','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        
        return redirect()->route('usuarios.index');
    }
}
