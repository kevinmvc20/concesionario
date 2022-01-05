@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Cliente <a href="{{ route('clientes.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('venta.cliente.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Carnet</th>
                        <th>Nombre</th>
                        <th>telefono</th>
                        
                        <th>Opciones</th>
                    </thead>
                    @foreach ($clientes as $cliente)
                        
                         <tr>
                            <td>{{ $cliente->persona->ci }}</td>
                            <td>{{ $cliente->persona->nombre }}</td>
                            <td>{{ $cliente->persona->telefono }}</td>
                            
                            
                            <td>
                            <a href="{{ route('clientes.edit',['id' => $cliente->id]) }}"><button class="btn btn-primary">Editar</button></a>
                            <a href="{{ route('clientes.show',['id' => $cliente->id]) }}"><button class="btn btn-default">Ver</button></a> 
                            
                            <a href="" data-target="#modal-delete-{{$cliente->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                            </tr>    
                            @include('venta.cliente.eliminar')
                    
                    @endforeach
                </table>
            </div>
            {{ $clientes->render() }}
        </div>
    </div>
    </div>
</div>
@endsection