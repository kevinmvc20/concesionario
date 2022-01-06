@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Nuevo Rol</h3>           
        </div>
    </div>
    <form action="{{route('roles.guardarNuevoRol')}}" method="POST" autocomplete="off">
    @csrf    
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xl-6">
                <div class="form-group">
                    <label for="rol_nombre">Nombre de Rol:</label>
                    <input type="text" name="rol_nombre" id="rol_nombre" class="form-control" placeholder="Nombre..." pattern="^[a-zA-Z0-9_áéíóúñÁÉÍÓÚÑ°\s]{0,200}$" value="{{old('direccion')}}" > 
                    @error('rol_nombre')
                        <span class="text-red"> {{ $message }} </span>
                    @enderror
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('roles.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection