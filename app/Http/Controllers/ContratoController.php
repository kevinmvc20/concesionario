<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContratoRequest;
use App\Models\Tipo_contrato;
use App\Models\Entrega_vehiculo;
use App\Models\Contrato;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContratoController extends Controller
{
    public function __construct(){
        $this->middleware('can:contratos.index')->only('index');
        $this->middleware('can:contratos.create')->only('create');
        $this->middleware('can:contratos.store')->only('store');
        $this->middleware('can:contratos.destroy')->only('destroy');
        $this->middleware('can:contratos.show')->only('show');
    }

    public function index(Request $request)
    {
        if($request){
        
            $consulta=trim($request->get('buscador'));
            $contratos= Contrato::where('id','LIKE','%'.$consulta.'%')
            ->orWhere('numero','LIKE','%' . $consulta . '%')
            ->orWhere('fecha','LIKE','%'.$consulta.'%')
            ->orderBy('id','desc')
            ->paginate(6);
            return view('venta.contrato.index',["contratos"=>$contratos,"buscador"=>$consulta]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_contratos=Tipo_contrato::all();
        $ventas = Venta::all();
        return view('venta.contrato.create',['tipo_contratos'=>$tipo_contratos,'ventas'=>$ventas]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContratoRequest $request)
    {   
        $mytime= Carbon::now('America/La_Paz');
        
        $contrato = new Contrato;
        $contrato->numero =$request->input('numero');
        $contrato->fecha = $mytime->toDateString();
        $contrato->descripcion =$request->input('descripcion');
        $contrato->tipo_contrato_id = $request->input('tipo_contrato');
        $contrato->venta_id = $request->input('venta');
        $contrato->save();

        $entrega_vehiculo = new Entrega_vehiculo;
        $entrega_vehiculo->fecha = $request->input('fecha');
        $entrega_vehiculo->descripcion = $request->input('descripcionEntrega');
        $entrega_vehiculo->contrato_id = $contrato->id;
        $entrega_vehiculo->save();

        $id_user= auth()->user()->id;
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Contrato','crear',$contrato->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('contratos.index');
    } 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contratos = Contrato::findOrFail($id);
        $contratos->load('tipo_contrato');
        $entrega_vehiculos = Entrega_vehiculo::where('contrato_id','=',$id)->get();
        return view('venta.contrato.show',['contratos'=>$contratos,'entrega_vehiculos'=>$entrega_vehiculos]);
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
        $contratos = Contrato::findOrFail($id);
        $contratos->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Contrato','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('contratos.index');
    }
}
