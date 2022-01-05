<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Persona;

class ClienteController extends Controller
{
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
    public function store(Request $request)
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
    public function update(Request $request, $id)
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
        return redirect()->route('clientes.index');
    }
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
