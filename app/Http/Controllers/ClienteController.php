<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PersonaRequest;
use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ClienteController extends Controller
{
    public function __construct(){
        $this->middleware('can:clientes.index')->only('index');
        $this->middleware('can:clientes.create')->only('create');
        $this->middleware('can:clientes.store')->only('store');
        $this->middleware('can:clientes.edit')->only('edit');
        $this->middleware('can:clientes.destroy')->only('destroy');
        $this->middleware('can:clientes.update')->only('update');
        $this->middleware('can:clientes.show')->only('show');
    }

    public static $tipo_cliente = 2;

    public function index(Request $request)
    {
        if ($request) {
            $consulta = trim($request->input('buscador'));
            $clientes = Cliente::with('persona')
            /* ->where('tipo',self::$tipo_cliente) */
            /* ->where('nombre','LIKE','%'.$consulta.'%') */
            ->orWhere('id','LIKE', '%' . $consulta . '%')
            ->orderBy('id','asc')
            ->paginate(6);            
        }
        return view('venta.cliente.index',['clientes' => $clientes,'buscador' => $consulta]);        
    }
    public function create()
    {
        return view('venta.cliente.create');
    }
    public function store(PersonaRequest $request)
    {
        $persona = new Persona();
        $persona->ci = $request->input('ci');
        $persona->nombre = $request->input('nombre');
        $persona->email = $request->input('email');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = self::$tipo_cliente;
        $persona->telefono = $request->input('telefono');
        $persona ->save();

        $cliente = new Cliente();
        $cliente->id_persona = $persona->id;
        $cliente->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Cliente','crear',$cliente->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('clientes.index');
    }
   
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->load('persona');
        return view('venta.cliente.edit',['cliente' => $cliente]);
    }
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->load('persona');
        return view('venta.cliente.show',['cliente' => $cliente]);
    }
    public function update(PersonaRequest $request, $id)
    {
        $persona = Persona::findOrFail($id);
        $persona->ci = $request->input('ci');
        $persona->nombre = $request->input('nombre');
        $persona->email = $request->input('email');
        $persona->direccion = $request->input('direccion');
        $persona->tipo = self::$tipo_cliente;
        $persona->telefono = $request->input('telefono');
        $persona->save();

        $client = $persona->cliente;
        $client->id_persona = $persona->id;
        $client->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Cliente','modificar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('clientes.index');
    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $persona = Persona::findOrFail($cliente->id_persona);
        $cliente->delete();
        $persona->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Cliente','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('clientes.index');
    }
}
