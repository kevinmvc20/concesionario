@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de usuarios <a href="{{ route('usuarios.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('usuario.usuario.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>email</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->persona->nombre }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->persona->telefono }}</td>
                            <td> {{ $usuario->getRoleNames() }} </td>
                            <td>
                               {{--  <a href="{{ route('marcas.edit',['id' => $marca->id]) }}"><button class="btn btn-primary">Editar</button></a> --}}
                               
                                 <a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a> 
                            </td>
                        </tr>        
                         @include('usuario.usuario.eliminar')                    
                    @endforeach
                </table>
            </div>
            {{ $usuarios->render() }}
        </div>
    </div>
    </div>
</div>
@endsection