<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bitacora;
use Illuminate\Support\Facades\App;
use PDF;

class BitacoraController extends Controller
{
    public function __construct(){
        $this->middleware('can:bitacoras.index')->only('index');
        $this->middleware('can:bitacoras.pdf')->only('downloadPDF');
    }

    public function index(Request $request)
    {
        if($request){
            $consulta = trim($request ->input('buscador'));
            $bitacoras = Bitacora::where('nombre_usuario','LIKE','%'.$consulta.'%')
            ->orWhere('id_user','LIKE','%'.$consulta.'%')
            ->orderBy('id','asc')
            ->paginate(15);
        }
        return view('usuario.bitacora.index',['bitacoras'=> $bitacoras,'buscador' => $consulta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }


    public function downloadPDF(){
        $bitacoras = Bitacora::all();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('usuario.bitacora.pdf', compact('bitacoras'));
            return $pdf->stream('invoice.pdf');
    }

}
