<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreditoRequest;
use App\Models\Credito;
use App\Models\Contrato;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CreditoController extends Controller
{
    public function __construct(){
        $this->middleware('can:creditos.index')->only('index');
        $this->middleware('can:creditos.create')->only('create');
        $this->middleware('can:creditos.store')->only('store');
        $this->middleware('can:creditos.destroy')->only('destroy');
        $this->middleware('can:creditos.show')->only('show');
    }

    public function index(Request $request)
    {
        if($request){
        
            $consulta=trim($request->get('buscador'));
            $creditos= Credito::where('id','LIKE','%'.$consulta.'%')
            ->orWhere('fecha','LIKE','%'.$consulta.'%')
            ->orderBy('id','desc')
            ->paginate(6);
            return view('venta.credito.index',["creditos"=>$creditos,"buscador"=>$consulta]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $contratos= Contrato::all();
        return view('venta.credito.create',['contratos'=>$contratos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreditoRequest $request)
    {
        $mytime= Carbon::now('America/La_Paz');

        $credito = new Credito;
        $credito->pagoinicial = $request->input('pagoinicial');
        $credito->entidad_financiera = $request->input('entidad_financiera');
        $credito->fecha = $mytime->toDateString();
        $credito->contrato_id = $request->input('contrato_id');

        $credito->save();

        $id_user= auth()->user()->id;
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Credito','crear',$credito->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('creditos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creditos = Credito::findOrFail($id);
        $creditos->load('contrato');
        return view('venta.credito.show',['creditos'=>$creditos]);
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
        $credito = Credito::findOrFail($id);
        $credito->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Credito','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('creditos.index');
    }
}
