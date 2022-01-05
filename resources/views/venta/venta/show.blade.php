@extends('layout.master')
@section('contenido')
<main class="main">
 <div class="panel">
  <h2 class="text-center">Detalle de Venta</h2><br>
        <div class="form-group row">
            <div class="col-lg-4">  
                <label class="form-control-label" for="nombre">Empleado:</label>                        
                <p>{{$venta->empleado_cliente->empleado->user->persona->nombre}}</p>                            
            </div>

            <div class="col-lg-4">  
                <label class="form-control-label" for="nombre">Cliente:</label>                        
                <p>{{$venta->empleado_cliente->cliente->persona->nombre}}</p>                            
            </div>
            
            <div class="col-lg-4">
                <label class="form-control-label" for="fecha">Fecha:</label>                            
                <p>{{$venta->fecha}}</p>
            </div>
            <div class="col-lg-4">
                <label class="form-control-label" for="cantidad">cantidad:</label>                            
                <p>{{$venta->cantidad}}</p>
            </div>
            <div class="col-lg-4">
                <label class="form-control-label" for="codigo_venta">codigo venta:</label>                            
                <p>{{$venta->codigo_venta}}</p>
            </div>
        </div>    
        <div class="row form-group border">
            {{-- <h3 style="margin-left: 20px">Detalle de Compras</h3> --}}
            <div class="table-responsive col-md-12">
            <table id="detalles" class="table table-bordered table-striped table-sm">
            <thead>
                <tr class="bg-success">
                    <th>vehiculo</th>
                    <th>Precio Unitario ($us.)</th>
                </tr>
            </thead>                                   
            
            <tbody>                   
                @foreach($nota_ventas as $nota_venta)
                    <tr>                     
                    <td>{{$nota_venta->vehiculo->nombre}}</td>
                    <td>{{$nota_venta->precio_unitario}}</td>            
                    </tr> 
                @endforeach                                
            </tbody>               
            
            </table>
            <div style="display: flex;justify-content: flex-end;margin-right:200px ">
                    <h4>Total: {{ $venta->subtotal }} $.</h4>  
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