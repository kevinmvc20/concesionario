<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProveedorRequest;
use App\Models\Proveedor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProveedorController extends Controller
{
    public function __construct(){
        $this->middleware('can:proveedores.index')->only('index');
        $this->middleware('can:proveedores.create')->only('create');
        $this->middleware('can:proveedores.store')->only('store');
        $this->middleware('can:proveedores.edit')->only('edit');
        $this->middleware('can:proveedores.destroy')->only('destroy');
        $this->middleware('can:proveedores.update')->only('update');
    }

    public function index(Request $request)
    {
        if ($request) {
            $consulta = trim($request->input('buscador'));
            $proveedores = Proveedor::where('nombre','LIKE','%'.$consulta.'%')
            ->orWhere('id','LIKE','%'.$consulta.'%')
            ->orWhere('telefono','LIKE', '%' . $consulta . '%')
            ->orderBy('id','asc')
            ->paginate(6);            
        }
        return view('compra.proveedor.index',['proveedores' => $proveedores,'buscador' => $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compra.proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request)
    {
        $proveedor = new Proveedor;
        $proveedor->nombre = $request->input('nombre');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Proveedor','crear',$proveedor->id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('proveedores.index');
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
        $proveedor = Proveedor::findOrFail($id);
        return view('compra.proveedor.edit',['proveedor'=>$proveedor]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProveedorRequest $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->direccion = $request->input('direccion');
        $proveedor->telefono = $request->input('telefono');
        $proveedor->email = $request->input('email');
        $proveedor->save();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Proveedor','modificar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        $id_user= auth()->user()->id;
        $mytime= Carbon::now('America/La_Paz'); 
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Proveedor','eliminar',$id,$mytime->toDateTimeString(),auth()->user()->id,auth()->user()->persona->nombre]);
        return redirect()->route('proveedores.index');
    }
}
