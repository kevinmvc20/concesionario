<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tipo_almacen;

class Tipo_almacenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request)
    {
        $tipoAlmacen = new Tipo_almacen();
        $tipoAlmacen->tipo = $request->input('tipo');
        $tipoAlmacen->save();
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
        $id_user= Auth::user();
        DB::statement('CALL nueva_bitacora(?,?,?,?,?,?)',['Tipo de Almacen','eliminar',$id,'2022-01-16','13:06:22',$id_user]);
        return redirect()->route('tipoalmacenes.index');
    }
}
