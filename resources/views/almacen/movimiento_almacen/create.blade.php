@extends('layout.master')
@section('contenido')

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Mover Almacen</h3>           
        </div>
    </div>
    <form action="{{route('movimientoAlmacen.store')}}" method="POST" autocomplete="off">
    @csrf    
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="vehiculo_id">Seleccionar Vehiculo:</label>
                        <select name="vehiculo_id" id="vehiculo_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{$vehiculo->id}}">{{$vehiculo->nombre}}-> almacen: {{ $vehiculo->almacen_id }}</option>
                            @endforeach
                        </select>
                @error('vehiculo_id')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="Alma_destino">Seleccionar Destino:</label>
                        <select name="Alma_destino" id="Alma_destino"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                            @foreach ($almacenes as $almacen)
                                <option value="{{$almacen->id}}">{{$almacen->id}}</option>
                            @endforeach
                        </select>
                @error('vehiculo_id')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        {{-- @push('scripts')
            <script >
                $(document).ready(function(){
                    
                    $("#vehiculo_id").change(function(){
                        $("#vehiculo_id option:selected").each(function(){
                            let id_vehiculo = $(this).val();
                            $("#Alma_origen").value = id_vehiculo;
                            
                        });
                    });
                });
                
            </script>
        @endpush" --}}
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Mover</button>
                <button class="btn btn btn-danger" type="reset">Cancelar</button>
                <a href={{route('movimientoAlmacen.index')}} class="btn btn-success">Atras</button></a>
            </div>
        </div>
    </div>    
</form>                    
@endsection
