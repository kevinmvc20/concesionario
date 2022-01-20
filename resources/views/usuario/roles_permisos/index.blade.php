@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Gestion de roles y permisos</h3>             
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listas de roles<a href="{{route('roles.crear')}}"><button class="btn btn-success">Nuevo Rol</button></a></h3>             
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                      
                    </thead>
                    @foreach ($roles as $rol)
                        <tr>
                            <td>{{$rol->id }}</td>                           
                            <td>{{$rol->name}}</td>
                            <td>
                                <a href="{{ route('roles.asignar',['id' => $rol->id]) }}"><button class="btn btn-primary">Asignar Permisos</button></a>
                            </td>
                            
                        </tr>        
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <h3>Listas de Permisos</h3>
            </div>                
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                      
                    </thead>
                    @foreach ($permisos as $permiso)
                        <tr>
                            <td>{{$permiso->id }}</td>                           
                            <td>{{$permiso->name}}</td>
                            {{-- <td>                                              
                                <a href="" data-target="#modal-delete-{{$almacen->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td> --}}
                        </tr>        
                        {{-- @include('almacen.almacen.eliminar')                    --}}
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
    <a href="{{ route('roles.asignarRol') }}"><button class="btn btn-primary">Asignar roles a usuarios</button></a>
</div>
@endsection