@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Bitacora<a href="{{ route('bitacoras.pdf') }}" class="btn btn-default" target="_blank"><i class="fa  fa-file-pdf-o"></i> PDF</a></h3>
            @include('usuario.bitacora.buscador')    
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th class="info">Id</th>
                        <th class="info">Usuario</th>
                        <th class="info">Id Usuario</th>
                        <th class="info">Apartado</th>
                        <th class="info">Accion</th>
                        <th class="info">Implicado</th>
                        <th class="info">Fecha</th>
                    </thead>
                    @foreach ($bitacoras as $bitacora)
                        
                        <tr>
                            <td>{{ $bitacora->id }}</td>
                            <td>{{ $bitacora->nombre_usuario }}</td>
                            <td>{{ $bitacora->id_user }}</td>
                            <td>{{ $bitacora->apartado }}</td>
                            <td>{{ $bitacora->accion }}</td>
                            <td>{{ $bitacora->implicado }}</td> 
                            <td>{{ $bitacora->fecha }}</td>
                            
                        </tr>     
                        
                        
                    @endforeach
                </table>
            </div>
            {{ $bitacoras->render() }}
        </div>
    </div>
    </div>
</div>
@endsection