@extends('layout.master')
@section('contenido')
    <div class="ventana"></div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-sm-12 col-xl-12">
            <h3>Nueva Venta</h3>            
        </div>
    </div>
    <form action="{{route('ventas.store')}}" method="POST" autocomplete="off">
    @csrf    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
            <div class="form-group">
                <label for="cliente_id">Cliente:</label>
                <select name="cliente_id" id="cliente_id" class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                    <option value="0">Seleccione:</option>
                    @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->persona->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>                
    </div>

    <div class="row">
        <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12">
            <div class="form-group">
                <label for="empleado_id">Empleado:</label>
                <input type="text" name="empleado_id" id="empleado_id" class="form-control " value="{{ auth()->user()->persona->nombre }}">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="codigo_venta">Codigo venta:</label>
                <input type="text" name="codigo_venta" id="codigo_venta" class="form-control" placeholder="codigoventa..." value="{{old('codigo_venta')}}">
                @error('codigo_venta')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
    </div>    
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div class="col-lg-4 col-sm-3 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="vehiculo_id">Vehiculo:</label>
                        <select name="vehiculo_id" id="vehiculo_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                            <option value="0">Seleccione:</option>
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{$vehiculo->id}}_{{ $vehiculo->precio }}">{{$vehiculo->nombre}}: {{ $vehiculo->nro_chasis}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{--
                <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidadtotal">Cantidad:</label>
                        <input type="number" name="cantidadtotal" id="cantidadtotal" class="form-control " placeholder="cantidad" >
                    </div>
                </div>  --}}

                

                <div class="col-lg-3 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="precio_unitario">Precio unitario</label>
                        <input type="number" name="precio_unitario" id="precio_unitario" class="form-control " placeholder="Precio unitario" >
                    </div>
                </div>
                {{-- <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="stock">stock:</label>
                        <input type="number" disabled name="stock" id="stock" class="form-control " placeholder="stock">
                    </div>
                </div> --}}
              
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <button type="button" id="agregar" class="btn btn-primary" style="margin-top: 20px">Agregar Nota Venta</button>
                    </div>
                </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                        <thead style="background-color: #A9D0F5">
                            <th>Opciones</th>
                            <th>Vehiculo</th>
                            {{-- <th>Cantidad</th> --}}
                            <th>Precio Unitario</th>
                            {{-- <th>Sub total</th> --}}
                        </thead>
                         <tfoot>
                            <th>Total</th>
                            <th></th>
                            <th>
                                <h4 id="total">00($us)</h4>
                                <input type="hidden" name="total_pagar" id="total_pagar">
                            </th>
                        </tfoot> 
                        
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xl-12" id="guardar">
            <div class="form-group">
                <input name="_token" {{-- value="{{crsf_token()}}" --}} type="hidden">
                @csrf
                <button class="btn btn-primary" type="submit">Guardar</button>
                {{-- <button class="btn btn btn-danger" type="reset">Cancelar</button> --}}
            </div>
        </div>
    </div>    
</form>  
 
@push('scripts')
    <script>
        $(document).ready(function(){
            $("#agregar").click(function(){
                agregar();
            })
        })
        let cont = 0, total = 0, subtotal = [];
        $("#guardar").hide();
        $("#vehiculo_id").change( mostrarValores );
        function mostrarValores(){
            datosVehiculo = document.getElementById('vehiculo_id').value.split('_');// Array [ "2", "20000.00" ]
            $("#precio_unitario").val( datosVehiculo[1] );
        }
        function agregar(){
            datosVehiculo = document.getElementById('vehiculo_id').value.split('_');// Array [ "1", "10000.00" ]
            vehiculo_id = datosVehiculo[0];// id del vehiculo
            vehiculo = $("#vehiculo_id option:selected").text();// nombre del vehiculo
            precio_unitario = $("#precio_unitario").val();
        
            if ( vehiculo_id != "" &&  precio_unitario !="" && precio_unitario >= 0 ) {
                subtotal[cont] = precio_unitario * 1;
                total = total + subtotal[cont];
                var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="vehiculo_id[]" value="'+vehiculo_id+'">'+vehiculo+'</td><td><input type="number" name="precio_unitario[]" value="'+precio_unitario+'"></td></tr>';
                cont++;
                limpiar();
                totales();
                evaluar();
                $('#detalles').append(fila);
            }
            else{
                const div = document.createElement('div');
                div.classList.add('alert','alert-danger');
                div.textContent = 'Error';
                document.querySelector('.ventana').appendChild( div );
                setTimeout(() => {
                    div.remove();// eliminar el div
                }, 1000);
            }
            
        }
        function totales(){
            $("#total").html(total + "$us.");
            $("#total_pagar").val(total);
        }
        function limpiar(){
            $("#precio_unitario").val("");
        }
        function evaluar(){
            if(total > 0){
                $("#guardar").show();
            }else{
                $("#guardar").hide();
            }
        }
        function eliminar(index) {
            total = total-subtotal[index];
            $("#total").html(total + "$us.");
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@endpush                             
@endsection
