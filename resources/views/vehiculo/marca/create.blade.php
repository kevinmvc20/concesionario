@extends('layout.master')
@section('contenido')

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3>Nueva Marca</h3>           
    </div>
</div>
<form action="{{route('marcas.store')}}" method="POST" autocomplete="off">
@csrf    
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
        <div class="form-group">
            <label for="nombre">Marca:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="nombre..." value="{{old('nombre')}}" pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$">
            @error('nombre')
                <span class="text-red"> {{ $message }} </span>
            @enderror
        </div>
    </div>   
    {{--
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
        <div class="form-group">
            <label for="id_vehiculo">Vehiculo:</label>
            <select name="id_vehiculo" id="id_vehiculo"  class="form-control selectpicker" data-live-search="true" data-dropup-auto="false" data-size="3">
                <option value="0" selected>Seleccione:</option>
                @foreach ($vehiculos as $vehiculo)
                    <option value="{{$vehiculo->id}}">{{$vehiculo->nombre}}</option>
                @endforeach
            </select>
        </div>
    </div>      
    --}}         

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn btn-danger" type="reset">Cancelar</button>
            <a href="{{route('marcas.index')}} " class="btn btn-success">Atras</button></a>
        </div>
    </div>
</div>    
</form>       

@endsection