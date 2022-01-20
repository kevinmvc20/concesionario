@extends('layout.master')
@section('contenido')
<main class="main">
 <div class="panel">
  <h2 class="text-center">Detalle Traslado</h2><br>
        <div class="row form-group border">
            <div class="table-responsive col-md-12">
                <table id="detalles" class="table table-bordered table-striped table-sm">
                    <h3>Descripcion del Traslado</h3>
                <thead>
                    <tr class="bg-success">
                        <th>ID</th>
                        <th>Estado</th>
                        <th>Id_vehiculo</th>
                        <th>Vehiculo</th>
                        <th>Nro Chasis</th>
                        
                    </tr>
                </thead>                                   
                <tbody>                   
                    <tr>                     
                    <td>{{$movAlmas->id}}</td>
                    <td>{{$movAlmas->descripcion}}</td>
                    <td>{{$movAlmas->vehiculo->id}}</td>                        
                    <td>{{$movAlmas->vehiculo->nombre}}</td>                        
                    <td>{{$movAlmas->vehiculo->nro_chasis}}</td>
                    </tr> 
                </tbody>
                </table>
            </div>
        </div>
        <div class="row form-group border">
            <div class="table-responsive col-md-12">
            <table id="detalles" class="table table-bordered table-striped table-sm">
            <h3>Detalles de Entrada y Salida</h3>
            <thead>
                <tr class="bg-success">
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Almacen</th>
                    <th>usuario</th>
                </tr>
            </thead>                                   
            <tbody>                   
                @foreach($detalles as $detalle)
                    <tr>                     
                    <td>{{$detalle->id}}</td>
                    <td>{{$detalle->tipo}}</td>
                    @if ($detalle->fecha== null)
                        <th>Sin confirmar</th>
                    @else
                        <td>{{$detalle->fecha}}</td>
                    @endif
                    <td>{{$detalle->almacen_id}}</td>
                    @if ($detalle->user_id == null)
                        <th>Sin confirmar</th>
                    @else
                        <td>{{$detalle->user_id}}</td>
                    @endif
                    </tr> 
                @endforeach                                
            </tbody>               
            </table>
        </div>
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 20px">
            <div class="form-group">             
                <a href="{{ route('movimientoAlmacen.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
  </main>

@endsection