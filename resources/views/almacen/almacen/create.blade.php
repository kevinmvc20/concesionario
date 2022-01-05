@extends('layout.master')
@section('contenido')

    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Crear Almacen</h3>           
        </div>
    </div>
    <form action="{{route('almacenes.store')}}" method="POST" autocomplete="off">
    @csrf    
    <div class="row">

    <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" name="stock"  class="form-control" placeholder="0" pattern="^[1-9]\d*(\.\d+)?$" value="{{old('stock')}}" disabled>
                @error('stock')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="tipo_almacen_id">Tipo:</label>
                        <select name="tipo_almacen_id" id="tipo_almacen_id"  class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                            <option value="0">Seleccione:</option>
                            @foreach ($tipo_almacenes as $tipo_almacen)
                                <option value="{{$tipo_almacen->id}}">{{$tipo_almacen->tipo}}</option>
                            @endforeach
                        </select>
                @error('tipo_almacen_id')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn btn-danger" type="reset">Cancelar</button>
                <a href="{{route('almacenes.index')}} " class="btn btn-success">Atras</button></a>
            </div>
        </div>
    </div>    
</form>                    
@endsection
