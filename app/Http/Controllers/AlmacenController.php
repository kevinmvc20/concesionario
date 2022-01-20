<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AlmacenRequest;
use App\Models\Almacen;
use App\Models\Tipo_almacen;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlmacenController extends Controller
{
    public function __construct(){
        $this->middleware('can:almacenes.index')->only('index');
        $this->middleware('can:almacenes.create')->only('create');
        $this->middleware('can:almacenes.store')->only('store');
        $this->middleware('can:almacenes.destroy')->only('destroy');
    }

    public function index(Request $request)
    {       
        $almacenes = Almacen::all();
        return view('almacen.almacen.index',['almacenes' => $almacenes]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_almacenes = Tipo_almacen::orderBy('tipo','asc')->get();
        return view('almacen.almacen.create',['tipo_almacenes'=>$tipo_almacenes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlmacenRequest $request)
    {
        $almacen = new Almacen;
        $almacen->stock = '0';
        $almacen->tipo_almacen_id = $request->input('tipo_almacen_id');
        $almacen->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Almacen','crear',$almacen->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('almacenes.index');
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
        $almacen = Almacen::findOrFail($id);
        $almacen->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Almacen','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('almacenes.index');
    }
}
