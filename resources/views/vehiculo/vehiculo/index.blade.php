@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Vehiculos 
                <a href="{{ route('vehiculos.create') }}"><button class="btn btn-success">Nuevo</button></a>
                
            </h3>
            @include('vehiculo.vehiculo.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th class="info">Id</th>
                        <th class="info">Nombre</th>
                        <th class="info">Precio</th>
                        <th class="info">Color</th>
                        <th class="info">Año</th>
                        <th class="info">Nro_chasis</th>
                        <th class="info">Opciones</th>
                    </thead>
                    @foreach ($vehiculos as $vehiculo)
                        
                        <tr>
                            <td>{{ $vehiculo->id }}</td>
                            <td>{{ $vehiculo->nombre }}</td>
                            <td>{{ $vehiculo->precio }}</td>
                            <td>{{ $vehiculo->color }}</td>
                            <td>{{ $vehiculo->año }}</td>
                            <td>{{ $vehiculo->nro_chasis }}</td> 
                            <td>
                                
                            <a href="{{ route('vehiculos.edit',['id' => $vehiculo->id]) }}"><button class="btn btn-primary">Editar</button></a>    
                        
                        
                            <a href="{{ route('vehiculos.show',['id' => $vehiculo->id]) }}"><button class="btn btn-secondary">Ver</button></a>    
                        
                            <a href="" data-target="#modal-delete-{{$vehiculo->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>    
                                
                               
                                
                            </td>
                        </tr>     
                        @include('vehiculo.vehiculo.eliminar')
                        
                    @endforeach
                </table>
            </div>
            {{ $vehiculos->render() }}
        </div>
    </div>
    </div>
</div>
@endsection