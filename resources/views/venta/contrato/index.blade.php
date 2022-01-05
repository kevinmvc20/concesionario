@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de contratos 
                <a href="{{ route('contratos.create') }}"><button class="btn btn-success">Nuevo</button></a>
                
            </h3>
            @include('venta.contrato.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th class="info">Id</th>
                        <th class="info">Numero</th>
                        <th class="info">fecha</th>
                        <th class="info">Descripcion</th>
                        <th class="info">Opciones</th>
                    </thead>
                    @foreach ($contratos as $contrato)
                        
                        <tr>
                            <td>{{ $contrato->id }}</td>
                            <td>{{ $contrato->numero }}</td>
                            <td>{{ $contrato->fecha }}</td>
                            <td>{{ $contrato->descripcion }}</td>
                            <td>
                                   
                        
                            <a href="{{ route('contratos.show',['id' => $contrato->id]) }}"><button class="btn btn-primary">Ver</button></a>    
                        
                            <a href="" data-target="#modal-delete-{{$contrato->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>    
                                
                               
                                
                            </td>
                        </tr>     
                        @include('venta.contrato.eliminar')
                        
                    @endforeach
                </table>
            </div>
            {{ $contratos->render() }}
        </div>
    </div>
    </div>
</div>
@endsection