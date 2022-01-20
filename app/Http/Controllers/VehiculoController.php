<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;
use App\Models\Vehiculo;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Almacen;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VehiculoController extends Controller
{
    public function __construct(){
        $this->middleware('can:vehiculos.index')->only('index');
        $this->middleware('can:vehiculos.create')->only('create');
        $this->middleware('can:vehiculos.store')->only('store');
        $this->middleware('can:vehiculos.edit')->only('edit');
        $this->middleware('can:vehiculos.destroy')->only('destroy');
        $this->middleware('can:vehiculos.update')->only('update');
        $this->middleware('can:vehiculos.show')->only('show');
    }

    public function index(Request $request)
    {
        if($request){
            $consulta = trim($request ->input('buscador'));
            $vehiculos = Vehiculo::where('nombre','LIKE','%'.$consulta.'%')
            ->orWhere('vehiculos.id','LIKE','%'.$consulta.'%')
            ->orderBy('id','asc')
            ->paginate(6);
        }
        return view('vehiculo.vehiculo.index',['vehiculos'=> $vehiculos,'buscador' => $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre','asc')->get();
        $marcas = Marca::orderBy('nombre','asc')->get();
        $almacenes = Almacen::orderBy('tipo_almacen_id','asc')->get();
        return view('vehiculo.vehiculo.create',['categorias' => $categorias, 'marcas'=> $marcas,'almacenes'=>$almacenes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response    
     */
    public function store(VehiculoRequest $request)
    {
        $vehiculo = new Vehiculo;
        $vehiculo->nombre = $request->input('nombre');
        $vehiculo->precio = $request->input('precio');
        $vehiculo->color = $request->input('color');
        $vehiculo->año = $request->input('año');
        $vehiculo->estado = 'ingresado';
        $vehiculo->nro_chasis = $request->input('nro_chasis');
        $vehiculo->categoria_id = $request->input('categoria_id');
        $vehiculo->marca_id = $request->input('marca_id');
        $vehiculo->almacen_id = $request->input('almacen_id');
        $vehiculo->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Vehiculo','crear',$vehiculo->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('vehiculos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->load('categoria');
        $vehiculo->load('marca');
        $vehiculo->load('almacen');
        return view('vehiculo.vehiculo.show',['vehiculo'=>$vehiculo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $almacenes = Almacen::all();
        return view('vehiculo.vehiculo.edit',['vehiculo' => $vehiculo,'categorias'=> $categorias,'marcas'=>$marcas,'almacenes'=>$almacenes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VehiculoRequest $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->nombre = $request->input('nombre');
        $vehiculo->precio = $request->input('precio');
        $vehiculo->color = $request->input('color');
        $vehiculo->año = $request->input('año');
        $vehiculo->nro_chasis = $request->input('nro_chasis');
        $vehiculo->categoria_id = $request->input('categoria_id');
        $vehiculo->marca_id = $request->input('marca_id');
        $vehiculo->almacen_id = $request->input('almacen_id');
        $vehiculo->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Vehiculo','modificar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Vehiculo','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('vehiculos.index');
    }
}
