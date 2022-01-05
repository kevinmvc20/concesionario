<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Nota_venta;
use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Empleado_cliente;
use App\Models\Vehiculo;
use Carbon\Carbon;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
        
            $consulta=trim($request->get('buscador'));
            $ventas= Venta::with('empleado_cliente')
            ->where('id','LIKE','%'.$consulta.'%')
            ->orWhere('fecha','LIKE','%' . $consulta . '%')
            ->orWhere('codigo_venta','LIKE','%'.$consulta.'%')
            ->orderBy('id','desc')
            ->paginate(6);
            return view('venta.venta.index',["ventas"=>$ventas,"buscador"=>$consulta]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $Vehiculos = Vehiculo::where('estado','=','disponible')->get();;
        
        return view('venta.venta.create',['empleados'=>$empleados,'clientes'=>$clientes,'vehiculos'=>$Vehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mytime= Carbon::now('America/La_Paz');
        $venta = new Venta();
        $empleado_clientes = new Empleado_cliente;
        $empleados = Empleado::all();
        $empleado_clientes->cliente_id = $request->input('cliente_id');
        
        $conta=0;
        foreach($empleados as $empleado){
            if($empleado->usuario_id == auth()->user()->id){
                $conta=$empleado->id;
            }
        }
        $empleado_clientes->empleado_id = $conta;
        $empleado_clientes->save();


        $venta->fecha = $mytime->toDateString();
        $venta->codigo_venta = $request->input('codigo_venta');
        $venta->descripcion = "venta exitosa";
        $venta->subtotal = $request->total_pagar;
        $venta->cantidad = 0;
        $venta->empleado_cliente_id=$empleado_clientes->id;
        $venta->save();

        $vehiculo_id = $request->vehiculo_id;
        
        $cont=0;
        while($cont < count($vehiculo_id)){
            $nota_venta = new Nota_venta;
            $nota_venta->precio_unitario = $request->precio_unitario[$cont];
            $nota_venta->venta_id = $venta->id;
            $nota_venta->vehiculo_id = $request->vehiculo_id[$cont];
            $nota_venta->save();
            $cont=$cont+1;
        }
        return redirect()->route('ventas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::FindorFail($id);
        $venta->load('empleado_cliente');
        
        $nota_ventas = Nota_venta::where('venta_id','=',$id)->get();
        

        return view('venta.venta.show', ['venta'=>$venta,'nota_ventas' => $nota_ventas]);
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
        $ventas = Venta::findOrFail($id);
        $ventas->delete();
        return redirect()->route('ventas.index');
    }
}
