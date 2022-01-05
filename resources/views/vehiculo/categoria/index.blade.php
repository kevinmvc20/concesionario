@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Categorias <a href="{{ route('categorias.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('vehiculo.categoria.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                <a href="{{ route('categorias.edit',['id' => $categoria->id]) }}"><button class="btn btn-primary">Editar</button></a>
                               
                                <a href="" data-target="#modal-delete-{{$categoria->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>        
                        @include('vehiculo.categoria.eliminar')                   
                    @endforeach
                </table>
            </div>
            {{ $categorias->render() }}
        </div>
    </div>
    </div>
</div>
@endsection