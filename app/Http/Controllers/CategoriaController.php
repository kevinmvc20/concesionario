<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriaController extends Controller
{
    
    public function __construct(){
        $this->middleware('can:categorias.index')->only('index');
        $this->middleware('can:categorias.create')->only('create');
        $this->middleware('can:categorias.store')->only('store');
        $this->middleware('can:categorias.edit')->only('edit');
        $this->middleware('can:categorias.destroy')->only('destroy');
        $this->middleware('can:categorias.update')->only('update');
    }

    public function index(Request $request)
    {
        if($request){
            $consulta = trim($request ->input('buscador'));
            $categorias = Categoria::where('nombre','LIKE','%'.$consulta.'%')
            ->orWhere('categorias.id','LIKE','%'.$consulta.'%')
            ->orderBy('id','asc')
            ->paginate(6);
        }
        return view('vehiculo.categoria.index',['categorias'=> $categorias,'buscador' => $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        $categoria = new Categoria;
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Categoria','crear',$categoria->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('categorias.index');

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
        $categoria = Categoria::findOrFail($id);
        return view('vehiculo.categoria.edit',['categoria'=>$categoria]);
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
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->input('nombre');
        $categoria->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Categoria','modificar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Categoria','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('categorias.index');
    }
}
