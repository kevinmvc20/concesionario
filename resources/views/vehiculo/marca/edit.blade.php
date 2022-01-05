@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Editar Marca</h3>           
        </div>
    </div>
    <form action="{{route('marcas.update',['id' => $marca->id])}}" method="POST" autocomplete="off">
    @csrf    
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre"  class="form-control" placeholder="Nombre..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{$marca->nombre}}">
                @error('nombre')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
                         

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn btn-danger" type="reset">Cancelar</button>
                <a href="{{route('marcas.index')}} " class="btn btn-success">Atras</button></a>
            </div>
        </div>
    </div>    
</form>                    
@endsection