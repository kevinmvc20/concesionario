<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\Tipo_almacenRequest;
use App\Models\Tipo_almacen;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Tipo_almacenController extends Controller
{
    public function __construct(){
        $this->middleware('can:tipoalmacenes.index')->only('index');
        $this->middleware('can:tipoalmacenes.create')->only('create');
        $this->middleware('can:tipoalmacenes.store')->only('store');
        $this->middleware('can:tipoalmacenes.destroy')->only('destroy');
    }

    public function index()
    {
        $T_almacens = Tipo_almacen::all();
        return view('almacen.tipo_almacen.index',['T_almacens'=>$T_almacens]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.tipo_almacen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Tipo_almacenRequest $request)
    {
        $tipoAlmacen = new Tipo_almacen();
        $tipoAlmacen->tipo = $request->input('tipo');
        $tipoAlmacen->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Tipo de Almacen','crear',$tipoAlmacen->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('tipoalmacenes.index');
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
        $tipoAlmacen = Tipo_almacen::findOrFail($id);
        $tipoAlmacen->delete();
        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Tipo de Almacen','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('tipoalmacenes.index');
    }
}
