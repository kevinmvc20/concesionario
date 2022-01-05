@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado Compras <a href="{{ route('compras.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('compra.compra.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Fecha</th>
                          
                        <th>Empleado</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($compras as $compra)
                        <tr>
                            <td>{{ $compra->id }}</td>
                            <td>{{ $compra->fecha }}</td>
                            
                            <td>{{ $compra->empleado->user->persona->nombre }}</td>
                            <td>{{ $compra->cantidadtotal }}</td>
                            <td>{{ $compra->subtotal }}</td>
                            <td>
                                <a href="{{ route('compras.show',['id' => $compra->id])}}"><button class="btn btn-primary"><i class="fa fa-info"></i> Detalles</button></a>

                                {{-- <a href="{{ route('compras.edit',['id' => $compra->id]) }}"><button class="btn btn-primary">Editar</button></a>--}}
                               
                                <a href="" data-target="#modal-delete-{{$compra->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> 
                            </td>
                        </tr>        
                         @include('compra.compra.eliminar')
                    @endforeach
                </table>
            </div>
            {{ $compras->render() }}
        </div>
    </div>
    </div>
</div>
@endsection