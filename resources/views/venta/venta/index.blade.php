@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado Ventas <a href="{{ route('ventas.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('venta.venta.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Codigo venta</th>
                        <th>Empleado</th>
                        <th>Cliente</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id }}</td>
                            <td>{{ $venta->fecha }}</td>
                            <td>{{ $venta->codigo_venta }}</td>
                            <td>{{ $venta->empleado_cliente->empleado->user->persona->nombre }}</td>
                            <td>{{ $venta->empleado_cliente->cliente->persona->nombre }}</td>
                            <td>{{ $venta->cantidad }}</td>
                            <td>{{ $venta->subtotal }}</td>
                            <td>
                                <a href="{{ route('ventas.show',['id' => $venta->id])}}"><button class="btn btn-primary"><i class="fa fa-info"></i> Detalles</button></a>

                                {{-- <a href="{{ route('compras.edit',['id' => $compra->id]) }}"><button class="btn btn-primary">Editar</button></a>--}}
                               
                                <a href="" data-target="#modal-delete-{{$venta->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> 
                            </td>
                        </tr>        
                         @include('venta.venta.eliminar') 
                    @endforeach
                </table>
            </div>
            {{ $ventas->render() }}
        </div>
    </div>
    </div>
</div>
@endsection