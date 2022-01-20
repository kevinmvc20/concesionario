<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Requests\MarcaRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MarcaController extends Controller
{
    public function __construct(){
        $this->middleware('can:marcas.index')->only('index');
        $this->middleware('can:marcas.create')->only('create');
        $this->middleware('can:marcas.store')->only('store');
        $this->middleware('can:marcas.edit')->only('edit');
        $this->middleware('can:marcas.destroy')->only('destroy');
        $this->middleware('can:marcas.update')->only('update');
    }


    public function index(Request $request)
    {
        if($request){
            $consulta = trim($request->input('buscador'));
            $marcas = Marca::where('nombre','LIKE','%'.$consulta.'%')
            ->orWhere('marcas.id','LIKE','%'.$consulta.'%')
            ->orderBy('id','asc')
            ->paginate(6);
        }

        return view('vehiculo.marca.index',['marcas'=>$marcas,'buscador'=>$consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.marca.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcaRequest $request)
    {
        $marca= new Marca;
        $marca->nombre =$request->input('nombre');
        $marca->save();
        
        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Marca','crear',$marca->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('marcas.index');
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
        $marca = Marca::findOrFail($id);
        return view('vehiculo.marca.edit',['marca'=>$marca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarcaRequest $request, $id)
    {
        $marca = Marca::findOrFail($id);
        $marca->nombre =$request->input('nombre');
        $marca->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Marca','modificar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
    return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = Marca::findOrFail($id);
        $marca->delete();
        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Marca','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('marcas.index');
    }
}
