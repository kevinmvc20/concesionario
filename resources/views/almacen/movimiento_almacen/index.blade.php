@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Movimiento de almacen
                <a href={{route('movimientoAlmacen.create')}}><button class="btn btn-success">Nuevo</button></a>
                
            </h3>
            
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        {{-- <th class="info">Id</th>
                        <th class="info">Nombre</th>
                        <th class="info">Precio</th>
                        <th class="info">Color</th>
                        <th class="info">Año</th>
                        <th class="info">Nro_chasis</th>
                        <th class="info">Opciones</th> --}}
                        <th class="info"> ID</th>
                        <th class="info"> Estado</th>
                        <th class="info"> ID Vehiculo</th>
                        <th class="info"> Vehiculo</th>
                        <th class="info"> Opciones</th>
                    </thead>
                    @foreach ($movimientos as $movimiento)
                        <tr>
                            <td>{{$movimiento->id}}</td>
                            <td>{{$movimiento->descripcion}}</td>
                            <td>{{$movimiento->vehiculo_id}}</td>
                            <td>{{$movimiento->vehiculo->nombre}}</td>

                            <td>
                                <a href="{{ route('movimientoAlmacen.show',['id' => $movimiento->id])}}"><button class="btn btn-primary"><i class="fa fa-info"></i> Detalles</button></a>
                            @if ($movimiento->descripcion === 'Pendiente')
                                <a href="{{ route('movimientoAlmacen.confirmar',['id' => $movimiento->id])}}"><button class="btn btn-secondary">Confirmar Llegada</button></a>        
                            @endif
                            
                        </tr>     
                        
                        
                    @endforeach 

                </table>
                   
            </div>
        </div>
    </div>
    </div>
</div>
@endsection