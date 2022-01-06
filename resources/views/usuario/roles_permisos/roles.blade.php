@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Asignar roles a usuario</h3>           
        </div>
    </div>
    <form action="{{route('roles.guardarRol')}}" method="POST" autocomplete="off">
    @csrf    
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label for="usuario_id">Usuario:</label>
                        <select name="usuario_id" id="usuario_id" class="form-control selectpicker" data-live-search="true" data-size="3" data-dropup-auto="false">
                            @foreach ($usuarios as $usuario)
                                <option value="{{$usuario->id}}">ID: {{$usuario->id}} Nombre:{{$usuario->persona->nombre}}</option>                                                            
                            @endforeach
                        </select>
                @error('usuario_id')
                    <span class="text-red"> {{ $message }} </span>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3>Selccionar roles</h3>
            @foreach ($roles as $rol)
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon">
                            <label for="{{ $rol->id }}"><p> {{ $rol->name }}</p></label>
                            <input type="checkbox" name="roles[]" value="{{$rol->id}}" id="{{$rol->id}}">
                        </span>
                        
                    </div>
                </div>
            @endforeach
        </div>                         
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn btn-danger" type="reset">Cancelar</button>
                <a href="{{route('roles.index')}} " class="btn btn-success">Atras</button></a>
            </div>
        </div>
    </div>    
</form>                    
@endsection