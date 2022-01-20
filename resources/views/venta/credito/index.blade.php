@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de creditos 
                <a href="{{ route('creditos.create') }}"><button class="btn btn-success">Nuevo</button></a>
                
            </h3>
            @include('venta.credito.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th class="info">Id</th>
                        <th class="info">Pago Inicial</th>
                        <th class="info">Entidad financiera</th>
                        <th class="info">fecha</th>
                        <th class="info">Opciones</th>
                    </thead>
                    @foreach ($creditos as $credito)
                        
                        <tr>
                            <td>{{ $credito->id }}</td>
                            <td>{{ $credito->pagoinicial }}</td>
                            <td>{{ $credito->entidad_financiera }}</td>
                            <td>{{ $credito->fecha }}</td>
                            <td>
                                   
                        
                            <a href="{{ route('creditos.show',['id' => $credito->id]) }}"><button class="btn btn-primary">Ver</button></a>    
                        
                            <a href="" data-target="#modal-delete-{{$credito->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>    
                                
                               
                                
                            </td>
                        </tr>     
                        @include('venta.credito.eliminar')
                        
                    @endforeach
                </table>
            </div>
            {{ $creditos->render() }}
        </div>
    </div>
    </div>
</div>
@endsection