@extends('layout.master')
@section('contenido')
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7">
            <h3>Asignar Permisos para : {{$rol->name}}</h3>           
        </div>
    </div>
    <form action="{{route('roles.storeRolPermiso',['id'=>$rol->id])}}" method="POST" autocomplete="off">
    @csrf 
    @method('PUT')   
        <div class="row">
            @foreach ($permisos as $permiso)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="input-group">
                    
                        <input type="checkbox" name="permisos[]"  value="{{$permiso->id}}" id="{{$permiso->id}}">
                        <label for="{{ $permiso->id }}"> {{ $permiso->name }}</label>
                    
                    
                </div>
            </div>
            @endforeach

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group" style="display: flex;justify-content: center">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                    <a href="{{route('roles.index')}} " class="btn btn-success">Atras</button></a>
                </div>
            </div>
        </div>    
</form>                    
@endsection