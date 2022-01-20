@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Nueva Cuota</h3>           
        </div>
    </div>
    <form action="{{route('cuotas.store')}}" method="POST" autocomplete="off">
    @csrf    
        <div class="row">
            
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="0" pattern="^[1-9]\d*(\.\d+)?$" value="{{old('cantidad')}}">
                    @error('cantidad')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="monto">Monto:</label>
                    <input type="number" name="monto" id="monto" class="form-control" placeholder="0" value="{{old('monto')}}" pattern="^[1-9]\d*(\.\d+)?$">
                    @error('monto')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
        <div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="credito_id">Credito:</label>
                            <select name="credito_id" id="credito_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                                <option value="0">Seleccione:</option>
                                @foreach ($creditos as $credito)
                                    <option value="{{$credito->id}}">nro_venta: {{$credito->contrato->venta->codigo_venta}}</option>    
                                @endforeach
                            </select>
                    @error('credito_id')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div> 
           
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="display: flex;justify-content: center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('cuotas.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection