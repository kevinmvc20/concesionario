<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipo_contrato;

class Tipo_contratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $T_contratos = Tipo_contrato::all();
        return view('venta.tipo_contrato.index',['T_contratos'=>$T_contratos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venta.tipo_contrato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_contrato = new Tipo_contrato();
        $tipo_contrato->tipo = $request->input('tipo');
        $tipo_contrato->descripcion = $request->input('descripcion');
        $tipo_contrato->save();
        return redirect()->route('tipocontratos.index');
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
        $tipo_contrato = Tipo_contrato::findOrFail($id);
        $tipo_contrato->delete();
        return redirect()->route('tipocontratos.index');
    }
}
