@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Tipos de Almacen<a href="{{ route('tipoalmacenes.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>  
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Tipo Almacen</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($T_almacens as $T_almacen)
                        <tr>
                            <td>{{ $T_almacen->id }}</td>
                            <td>{{ $T_almacen->tipo }}</td>
                            <td>
                                <a href="" data-target="#modal-delete-{{$T_almacen->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>        
                        @include('almacen.tipo_almacen.eliminar')                   
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
    </div>
</div>
@endsection