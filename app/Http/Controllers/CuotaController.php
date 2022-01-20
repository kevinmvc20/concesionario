<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Credito;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CuotaController extends Controller
{
    public function __construct(){
        $this->middleware('can:cuotas.index')->only('index');
        $this->middleware('can:cuotas.create')->only('create');
        $this->middleware('can:cuotas.store')->only('store');
        $this->middleware('can:cuotas.destroy')->only('destroy');
        $this->middleware('can:cuotas.show')->only('show');
    }

    public function index(Request $request)
    {
        if ($request) {
            $consulta = trim($request->input('buscador'));
            $cuotas = Cuota::where('credito_id','LIKE','%'.$consulta.'%')
            ->orderBy('id','asc')
            ->paginate(6);            
        }
        return view('venta.cuota.index',['cuotas' => $cuotas,'buscador' => $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $creditos = Credito::all();
        return view('venta.cuota.create',['creditos'=>$creditos]);
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
        
        $cuotas = new Cuota;
        $cuotas->cantidad =$request->input('cantidad');
        $cuotas->monto =$request->input('monto');
        $cuotas->fecha = $mytime->toDateString();   
        $cuotas->credito_id= $request->input('credito_id');
        $cuotas->save();

        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Cuota','crear',$cuotas->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('cuotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuotas = Cuota::findOrFail($id);
        $cuotas->load('credito');
        return view('venta.cuota.show',['cuotas'=>$cuotas]);
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
        $cuotas = Cuota::findOrFail($id);
        $cuotas->delete();

        $mytime= Carbon::now('America/La_Paz');
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Cuota','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('cuotas.index');
    }
}
