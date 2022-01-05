@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Tipos de Contratos<a href="{{ route('tipocontratos.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>  
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Tipo Contrato</th>
                        <th>Descripcion</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($T_contratos as $T_contrato)
                        <tr>
                            <td>{{ $T_contrato->id }}</td>
                            <td>{{ $T_contrato->tipo }}</td>
                            <td>{{ $T_contrato->descripcion }}</td>
                            <td>
                                <a href="" data-target="#modal-delete-{{$T_contrato->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>        
                        @include('venta.tipo_contrato.eliminar')                   
                    @endforeach
                </table>
            </div>
            
        </div>
    </div>
    </div>
</div>
@endsection