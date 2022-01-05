@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Proveedores <a href="{{ route('proveedores.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('compra.proveedor.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($proveedores as $proveedor)
                        <tr>
                            <td>{{ $proveedor->id }}</td>
                            <td>{{ $proveedor->nombre }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->email }}</td>
                            <td>
                                <a href="{{ route('proveedores.edit',['id' => $proveedor->id]) }}"><button class="btn btn-primary">Editar</button></a>
                               
                                <a href="" data-target="#modal-delete-{{$proveedor->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>        
                        @include('compra.proveedor.eliminar')                   
                    @endforeach
                </table>
            </div>
            {{ $proveedores->render() }}
        </div>
    </div>
    </div>
</div>
@endsection