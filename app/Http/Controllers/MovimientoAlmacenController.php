<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Almacen;
use App\Models\DetalleMovimiento;
use App\Models\MovimientoAlmacen;
use App\Models\Vehiculo;
use Carbon\Carbon;

class MovimientoAlmacenController extends Controller
{
    public function __construct(){
        $this->middleware('can:movimientoAlmacen.index')->only('index');
        $this->middleware('can:movimientoAlmacen.create')->only('create');
        $this->middleware('can:movimientoAlmacen.store')->only('store');
        $this->middleware('can:movimientoAlmacen.show')->only('show');
        $this->middleware('can:movimientoAlmacen.confirmar')->only('confirmar');
    }


    public function index()
    {
        $movimientos = MovimientoAlmacen::all();
        $detalles = DetalleMovimiento::all();
        return view('almacen.movimiento_almacen.index',['movimientos'=>$movimientos, 'detalles'=>$detalles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehiculos = Vehiculo::all();
        $almacenes = Almacen::all();
        return view('almacen.movimiento_almacen.create',['vehiculos'=>$vehiculos,'almacenes'=>$almacenes]);
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
        
        $nuevoMovAlma = new MovimientoAlmacen;
        $detalle = new DetalleMovimiento;
        $detalle2 = new DetalleMovimiento;
        $vehiculo_id = $request->input('vehiculo_id');
        $vehiculo = Vehiculo::findOrFail($vehiculo_id);

        $nuevoMovAlma->descripcion = 'Pendiente';
        $nuevoMovAlma->vehiculo_id = $vehiculo_id;
        $nuevoMovAlma->save();
        $detalle->tipo = 'salida';
        $detalle->fecha= $mytime->toDateTimeString();
        $detalle->movimiento_almacen_id = $nuevoMovAlma->id;
        $detalle->almacen_id = $vehiculo->almacen_id;
        $detalle->user_id = auth()->user()->id;
        $detalle->save();
        $detalle2->tipo = 'entrada';
        $detalle2->fecha= null;
        $detalle2->movimiento_almacen_id = $nuevoMovAlma->id;
        $detalle2->almacen_id = $request->input('Alma_destino');
        $detalle2->user_id = null;
        $detalle2->save();
        return redirect()->route('movimientoAlmacen.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $MovAlma = MovimientoAlmacen::findOrFail($id);
        $detalle = DetalleMovimiento::where("detalle_movimientos.movimiento_almacen_id","=",$id)->get();
        return view('almacen.movimiento_almacen.show',['movAlmas'=> $MovAlma, 'detalles'=>$detalle]);
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
        //
    }

    public function confirmar($id){
        $mytime= Carbon::now('America/La_Paz');

        
        $MovAlma = MovimientoAlmacen::findOrFail($id);
        $detalles = DetalleMovimiento::where("detalle_movimientos.movimiento_almacen_id","=",$id)->where("detalle_movimientos.tipo","=","entrada")->first();
        $movimientos = DetalleMovimiento::where("detalle_movimientos.movimiento_almacen_id","=",$id)->where("detalle_movimientos.tipo","=","salida")->first();
        $vehiculo = Vehiculo::findOrFail($MovAlma->vehiculo_id);

        $almacen = Almacen::findOrFail($detalles->almacen_id);
        $almacen->stock++;
        $almacen->save();
        
        
        $almacen2 = Almacen::findOrFail($movimientos->almacen_id);
        $almacen2->stock--;
        $almacen2->save();
        

        $detalles->fecha = $mytime->toDateTimeString();
        $detalles->user_id = auth()->user()->id;
        $MovAlma->descripcion = 'Confirmado';
        $MovAlma->save();
        $detalles->save();
        
        $vehiculo->almacen_id = $detalles->almacen_id;
        $vehiculo->save();
        return redirect()->route('movimientoAlmacen.index');
    }

    
}
