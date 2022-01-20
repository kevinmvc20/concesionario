<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compra;
use App\Models\Empleado;
use App\Models\Orden_compra;
use App\Models\Vehiculo;
use App\Models\Proveedor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function __construct(){
        $this->middleware('can:compras.index')->only('index');
        $this->middleware('can:compras.create')->only('create');
        $this->middleware('can:compras.store')->only('store');
        $this->middleware('can:compras.destroy')->only('destroy');
        $this->middleware('can:compras.show')->only('show');
    }

    public function index(Request $request)
    {
        if($request){
        
            $consulta=trim($request->get('buscador'));
            $compras= Compra::with('empleado')
            ->where('id','LIKE','%'.$consulta.'%')
            ->orWhere('fecha','LIKE','%' . $consulta . '%')
            ->orderBy('id','desc')
            ->paginate(6);
            return view('compra.compra.index',["compras"=>$compras,"buscador"=>$consulta]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::where('estado','=','ingresado')->get();
        $proveedores = Proveedor::all();
        return view('compra.compra.create',['vehiculos' => $vehiculos, 'proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd( $request );
        $mytime= Carbon::now('America/La_Paz');
        $compra = new Compra();
        $empleados = Empleado::all();
        $compra->fecha = $mytime->toDateString();
        $compra->subtotal = $request->total_pagar;
        $compra->cantidadtotal = 0;
        $conta=0;
        foreach($empleados as $empleado){
            if($empleado->usuario_id == auth()->user()->id){
                $conta=$empleado->id;
            }
        }
        $compra->empleado_id = $conta;
        $compra->save();
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Compra','crear',$compra->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);

        $vehiculo_id = $request->vehiculo_id;
        
        $cont=0;
        while($cont < count($vehiculo_id)){
            $orden_compra = new Orden_compra;
            $orden_compra->precio_unitario = $request->precio_unitario[$cont];
            $orden_compra->descripcion = "Compra exitosa";
            $orden_compra->proveedor_id=$request->proveedor_id;
            $orden_compra->compra_id = $compra->id;
            $orden_compra->vehiculo_id = $request->vehiculo_id[$cont];
            $orden_compra->save();
            $cont=$cont+1;
        }

        
        
        return redirect()->route('compras.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $compra = Compra::findOrFail($id);
        
        
        $orden_compras = Orden_compra::where('compra_id','=',$id)->get();
        

        return view('compra.compra.show', ['compra'=>$compra,'orden_compras' => $orden_compras]);
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
        $compra = Compra::findOrFail($id);
        $compra->delete();

        
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Compra','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('compras.index');
    }
}
