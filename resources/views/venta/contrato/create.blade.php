@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Nuevo Contrato</h3>           
        </div>
    </div>
    <form action="{{route('contratos.store')}}" method="POST" autocomplete="off">
    @csrf    
        <div class="row">
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="numero">Numero:</label>
                    <input type="number" name="numero" id="numero" class="form-control" placeholder="0" pattern="^[1-9]\d*(\.\d+)?$" value="{{old('numero')}}">
                    @error('numero')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="descripcion..." value="{{old('descripcion')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
                    @error('descripcion')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
        <div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="fecha">Entrega vehiculo fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" placeholder="fecha..."  value="{{old('fecha')}}" >
                    @error('fecha')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="descripcionEntrega">Descripcion Entrega Vehiculo:</label>
                    <input type="text" name="descripcionEntrega" id="descripcionEntrega" class="form-control" placeholder="descripcion..." value="{{old('descripcionEntrega')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
                    @error('descripcionEntrega')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
        </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="tipo_contrato">Tipo Contrato:</label>
                            <select name="tipo_contrato" id="tipo_contrato"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($tipo_contratos as $tipo_contrato)
                                    <option value="{{$tipo_contrato->id}}">{{$tipo_contrato->tipo}}</option>    
                                @endforeach
                            </select>
                    @error('tipo_contrato')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>     

            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="venta">Venta:</label>
                            <select name="venta" id="venta"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($ventas as $venta)
                                    <option value="{{$venta->id}}">{{$venta->codigo_venta}}</option>    
                                @endforeach
                            </select>
                    @error('venta')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            
            
            

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="display: flex;justify-content: center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('contratos.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection