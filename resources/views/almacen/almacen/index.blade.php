@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de almacenes <a href="{{ route('almacenes.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>             
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Tipo</th>
                        <th>Stock</th>
                      
                    </thead>
                    @foreach ($almacenes as $almacen)
                        <tr>
                            <td>{{ $almacen->id }}</td>
                            <td>{{ $almacen->tipo_almacen->tipo }}</td>
                            <td>{{ $almacen->stock }}</td>
                        
                            <td>                                              
                                <a href="" data-target="#modal-delete-{{$almacen->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>        
                        @include('almacen.almacen.eliminar')                   
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
    </div>
</div>
@endsection