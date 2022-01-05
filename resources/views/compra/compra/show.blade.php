@extends('layout.master')
@section('contenido')
<main class="main">
 <div class="panel">
  <h2 class="text-center">Detalle Orden de Compra</h2><br>
        <div class="form-group row">
            <div class="col-lg-4">  
                <label class="form-control-label" for="nombre">Empleado:</label>                        
                <p>{{$compra->empleado->user->persona->nombre}}</p>                            
            </div>
            
            <div class="col-lg-4">
                <label class="form-control-label" for="fecha">Fecha:</label>                            
                <p>{{$compra->fecha}}</p>
            </div>
            <div class="col-lg-4">
                <label class="form-control-label" for="cantidad">cantidad:</label>                            
                <p>{{$compra->cantidadtotal}}</p>
            </div>
        </div>    
        <div class="row form-group border">
            {{-- <h3 style="margin-left: 20px">Detalle de Compras</h3> --}}
            <div class="table-responsive col-md-12">
            <table id="detalles" class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="bg-success">
                    <th>vehiculo</th>
                    <th>Proveedor</th>
                    <th>Precio Unitario ($us.)</th>
                </tr>
            </thead>                                   
            
            <tbody>                   
                @foreach($orden_compras as $orden)
                    <tr>                     
                    <td>{{$orden->vehiculo->nombre}}</td>
                    <td>{{$orden->proveedor->nombre}}</td>
                    <td>{{$orden->precio_unitario}}</td>            
                    </tr> 
                @endforeach                                
            </tbody>               
            
            </table>
            <div style="display: flex;justify-content: flex-end;margin-right:200px ">
                    <h4>Total: {{ $compra->subtotal }} $us.</h4>  
            </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-12 col-md-6" style="margin-top: 20px">
            <div class="form-group">             
                <a href="{{ route('compras.index') }}" class="btn btn-primary">Atras</a>
            </div>
        </div>
    </div>
  </main>

@endsection