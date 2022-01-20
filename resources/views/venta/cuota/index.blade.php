@extends('layout.master')
@section('contenido')
<div class="row">
    <div class="col-lg-12">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
            <h3>Listado de Cuotas<a href="{{ route('cuotas.create') }}"><button class="btn btn-success">Nuevo</button></a></h3>  
            @include('venta.cuota.buscador')  
        </div>                
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Cantidad</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Credito Id</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($cuotas as $cuota)
                        <tr>
                            <td>{{ $cuota->id }}</td>
                            <td>{{ $cuota->cantidad }}</td>
                            <td>{{ $cuota->monto }}</td>
                            <td>{{ $cuota->fecha }}</td>
                            <td>{{ $cuota->credito_id }}</td>
                            <td>
                                <a href="{{ route('cuotas.show',['id' => $cuota->id]) }}"><button class="btn btn-primary">Ver</button></a>    

                                <a href="" data-target="#modal-delete-{{$cuota->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                            </td>
                        </tr>        
                        @include('venta.cuota.eliminar')                   
                    @endforeach
                </table>
            </div>
            {{ $cuotas->render() }}
        </div>
    </div>
    </div>
</div>
@endsection